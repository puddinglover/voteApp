angular.module('voteApp')
    .controller('appController', appController);

appController.$inject = ["$scope", "$http", "$window", "$q", '$cookies', "asyncService"];

function appController($scope, $http, $window, $q, $cookies, asyncService) {

    var vm = this;

    var init = function(){
      console.log('VOTEAPP LIVE MOTHERFUCKER');
    }

    init();

    return vm;
}
