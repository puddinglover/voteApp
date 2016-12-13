(function () {
    'use strict';

    angular.module('voteApp')
        .controller('aboutController', aboutController);

    aboutController.$inject = ["$scope", "$http", "$window", "$q"];

    function aboutController($scope, $http, $window, $q) {

        var vm = this;
        
        vm.Heading = "About Page";
        vm.Text = "This is a sample about page.";

        return vm;
    }
})();
