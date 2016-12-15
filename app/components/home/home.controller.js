angular.module('voteApp')
    .controller('homeController', homeController);

homeController.$inject = ["$scope", "$http", "$window", "$q", "asyncService"];

function homeController($scope, $http, $window, $q, asyncService) {

    var vm = this;

    var currentUserCookieValue = "";
    var currentUser = "";
    vm.ideasData = '';
    vm.appUrl = "../dist/app/";
    vm.tempUserName = "anonymous";

    var init = function(){
      var cookieKey = 'voteAppCookie';
      // $cookies.remove(cookieKey);
      asyncService.getCookieValue(cookieKey)
      .then(function(result){
        var cookieValue = result;
        if(result === false){
          var cookieValue = generateUid();
          return asyncService.createCookie(cookieKey, cookieValue);
        }
        return $q.resolve(cookieValue);
      })
      .then(function(result){
        currentUserCookieValue = result;
        return asyncService.getUserWithCookie(currentUserCookieValue);
      })
      .then(function(result){
        if(result.data === "false") {
          console.log('creating user: ', result.data);
          return asyncService.createUserWithCookie(currentUserCookieValue);
        }
        return $q.resolve(result);
      })
      .then(function(result){
        if(result.data === "true") {
          return asyncService.getUserWithCookie(currentUserCookieValue);
        }
        return $q.resolve(result);
      })
      .then(function(result){
        currentUser = result.data;
        console.log(result.data);
        if(currentUser.username !== ""){
          vm.currentUserUsername = currentUser.username;
        }
        $q.resolve('No username');
      })
      .then(function(result){
        asyncService.getIdeasData()
        .then(function(result){
          console.log(result.data);
          vm.ideasData = result.data;
        });
      })
      .catch(function(error){
        if(error.status === 400){
          console.log(error.data);
        } else {
          console.log(error);
        }
      });

      // vm.asyncService.getCurrentUser();
      console.log('CONTROLLER LIVE MOTHERFUCKER');
    }


    vm.saveUserName = function(userName){
      asyncService.insertUserName(currentUser.cookie, userName)
      .then(function(result){
        if(result.data === "true") {
          vm.currentUserUsername = userName;
        } else {
          console.log(result.data);
        }

      })
      .catch(function(error){
        console.log(error.data);
      });
    }

    vm.changeVote = function(idea){
      var ideaID = idea.id;
      asyncService.changeVote(currentUser.id, ideaID)
      .then(function(result){
        var data = result.data;
        if(data.executed === true) {
          if(data.action === "like"){
            idea.number_of_likes++;
            idea.userLikes = true;
          } else if( data.action === "unlike") {
            idea.number_of_likes--;
            idea.userLikes = false;
          }
        } else {
          console.log(result.data);
        }
      })
      .catch(function(error){
        console.log(error.data);
      });
    }

    // Sudo random generator for Cookie ID's
    var generateUid = function (separator) {
      var delim = separator || "-";

      function S4() {
          return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
      }

      return (S4() + S4() + delim + S4() + delim + S4() + delim + S4() + delim + S4() + S4() + S4());
    };

    init();

    return vm;
}
