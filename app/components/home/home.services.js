angular.module('voteApp.homeServices', [])
    .service('asyncService', asyncService);

asyncService.$inject = ['$http', '$q'];

function asyncService($http, $q) {

  var appUrl = "../dist/app/";

  var factory = {
    //properties
    getIdeasData: getIdeasData
  };

  function getIdeasData() {
    return $http({
      method: 'GET',
      url: appUrl + "ajax/getideas.php"
    });
  }

  return factory;
};
