/**
 * Load modules for application
 */

angular.module('voteApp', [
	'ui.router',
	'ngMaterial',
	'ngAnimate',
	'ngCookies',
	'voteApp.services'
])

.constant('CONFIG',
{
	DebugMode: true,
	StepCounter: 0,
	APIHost: 'http://localhost:3000/sustainableValley/dist/voteApp/'
});
