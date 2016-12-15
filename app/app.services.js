angular.module('voteApp.services', [])
    .service('asyncService', asyncService);

asyncService.$inject = ['$http', '$q', '$cookies'];

function asyncService($http, $q, $cookies) {

  var appUrl = "../dist/app/";

  var factory = {
    //properties
    getIdeasData: getIdeasData,
    getCurrentUser: getCurrentUser,
    getCookieValue: getCookieValue,
    getUserWithCookie : getUserWithCookie,
    createCookie: createCookie,
    createUserWithCookie: createUserWithCookie,
    insertUserName: insertUserName,
    checkUserLikeIdea: checkUserLikeIdea,
    likeIdea: likeIdea,
    unlikeIdea: unlikeIdea
  };

  function getIdeasData() {
    return $http({
      method: 'GET',
      url: appUrl + "ajax/getideas.php"
    });
  }

  function getCurrentUser() {
    return $http({
      method: 'GET',
      url: appUrl + "ajax/getCurrentUser.php"
    });
  }

  function getCookieValue(cookieKey) {
    return $q(function(resolve, reject){
      if(!cookieKey){
        reject('Missing cookieKey');
      }
      var cookieValue = $cookies.getObject(cookieKey);
      if(cookieValue){
        resolve(cookieValue);
      }
      resolve(false);
    });
  }

  function getUserWithCookie(cookieID) {
    var data = {'cookieID' : cookieID};
    var json = JSON.stringify(data);
    return $http({
      method: 'POST',
      url: appUrl + "ajax/getCookieUser.php",
      data: json
    });
  }

  function insertUserName(cookieID, userName) {
    var data = {
      'cookieID' : cookieID,
      'userName' : userName
    };
    var json = JSON.stringify(data);
    return $http({
      method: 'POST',
      url: appUrl + "ajax/insertUserName.php",
      data: json
    });
  }

  function createUserWithCookie(cookieID) {
    var data = {'cookieID' : cookieID};
    var json = JSON.stringify(data);
    return $http({
      method: 'POST',
      url: appUrl + "ajax/createCookieUser.php",
      data: json
    });
  }

  function createCookie(cookieKey, cookieValue) {
    return $q(function(resolve, reject){
      if(!cookieKey || !cookieValue) {
        reject('Missing cookieName or cookieValue');
      }
      var result = $cookies.putObject(cookieKey, cookieValue);
      getCookieValue(cookieKey)
      .then(function(result){
        resolve(result);
      })
      .catch(function(error){
        reject('Couldnt find the created key');
      })
    });
  }

  function checkUserLikeIdea(userID, ideaID) {
    var data = {
      'userID' : userID,
      'ideaID' : ideaID
    };
    var json = JSON.stringify(data);
    return $http({
      method: 'POST',
      url: appUrl + "ajax/checkUserLikeIdea.php",
      data: json
    });
  }

  function likeIdea(userID, ideaID) {
    var data = {
      'userID' : userID,
      'ideaID' : ideaID
    };
    var json = JSON.stringify(data);
    return $http({
      method: 'POST',
      url: appUrl + "ajax/likeIdea.php",
      data: json
    });
  }

  function unlikeIdea(userID, ideaID) {
    var data = {
      'userID' : userID,
      'ideaID' : ideaID
    };
    var json = JSON.stringify(data);
    return $http({
      method: 'POST',
      url: appUrl + "ajax/unlikeIdea.php",
      data: json
    });
  }

  return factory;
};
