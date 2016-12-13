angular.module('voteApp')
    .controller('homeController', homeController);

homeController.$inject = ["$scope", "$http", "$window", "$q", "asyncService"];

function homeController($scope, $http, $window, $q, asyncService) {

    var vm = this;

    vm.ideasData = '';

    //services

    var init = function(){
      asyncService.getIdeasData()
      .then(function(result){
        vm.ideasData = result.data;
      });
    }

    init();

    return vm;
}
