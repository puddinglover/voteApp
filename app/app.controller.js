angular.module('voteApp')
    .controller('appController', appController);

appController.$inject = ["$scope", "$http", "$window", "$q"];

function appController($scope, $http, $window, $q) {

    var vm = this;


    var init = function(){
      console.log('CONTROLLER LIVE MOTHERFUCKER');
    }

    init();

    return vm;
}
