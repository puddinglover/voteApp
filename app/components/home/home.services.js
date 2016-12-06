(function () {
    'use strict';

    angular.module('voteApp', [])
        .service('asyncService', asyncService);

    asyncService.$inject = ['$http', '$q'];

    function asyncService($http, $q) {

        var factory = {
            //properties
            getColumnData: getColumnData
        };

        function getIdeasData() {
          var defer = $q.defer();

          $http({
              method: 'GET',
              url: "../../ajax/getIdeas.php"

          }).then(function successCallback(response) {
              defer.resolve(response.data);
          }, function errorCallback(response) {
              defer.reject(response);
          });

          return defer.promise
        }

        function getColumnData(columnum) {

            var defer = $q.defer()

            $http({
                method: 'GET',
                url: "http://jsonplaceholder.typicode.com" + "/posts/" + columnum

            }).then(function successCallback(response) {
                defer.resolve(response.data);
            }, function errorCallback(response) {
                defer.reject(response);
            });

            return defer.promise
        }

        return factory;
    }
})();
