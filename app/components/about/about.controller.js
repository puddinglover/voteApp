(function () {
    'use strict';

    angular.module('voteApp')
        .controller('aboutController', aboutController);

    aboutController.$inject = ["$scope", "$http", "$window", "$q"];

    function aboutController($scope, $http, $window, $q) {

        var vm = this;

        return vm;
    }
})();
