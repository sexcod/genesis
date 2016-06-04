
(function(){
    
angular.module('app', ['ngNewRouter','app.home'])
  .controller('AppController', AppController);


function AppController ($router) {
$router.config([
  {path: '/', component: 'home' }
]);
}

AppController['$inject'] = ['$router'];
})();