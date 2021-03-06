/**
 * Load states for application
 * more info on UI-Router states can be found at
 * https://github.com/angular-ui/ui-router/wiki
 */
angular.module('voteApp')
    .config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider){

    // any unknown URLS go to 404
    $urlRouterProvider.otherwise('/404');
    // no route goes to index
    $urlRouterProvider.when('', '/home');
    // use a state provider for routing

    $stateProvider.state('home', {
      url: '/home',
            templateUrl: 'app/components/home/views/home.view.php',
            controller: "homeController",
            controllerAs: 'homeCtrl'
        })
        .state('404', {
            url: '/404',
            templateUrl: 'app/shared/404.html'
        })
        .state('about', {
            url: '/about',
            templateUrl: 'app/components/about/views/about.view.php',
            controller: 'aboutController',
            controllerAs: 'aboutCtrl'
        });
}]);
