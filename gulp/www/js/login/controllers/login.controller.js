'use strict';

(function () {

  angular.module(G.app.name)
    .controller('LogInController', ['$scope', '$state', '$sessionStorage', 'constantUser', 'ExpenseProvider', 'ImageProvider', 'UserProvider',
      function ($scope, $state, $sessionStorage, constantUser, ExpenseProvider, ImageProvider, UserProvider) {


        $scope.signin = {
          user: {
            username: '',
            password: ''
          },
          submit: function () {
            if (UserProvider.checkUsername($scope.signin.user.username)) {
              $sessionStorage.user = $scope.signin.user;
              $state.go('main.home', {}, {reload: true});
            } else {
              $scope.signin.user.username = $scope.signin.user.password = '';
            }
          }
        };
        /*
         UserProvider.login().then(function(data){
         console.log(data);
         });

         $scope.addExpense = function(){
         $scope.main.loader = true;
         ExpenseProvider.addExpense().then(function(data){
         $scope.main.result = data;
         $scope.main.loader = false;
         });
         };

         $scope.getExpenseList = function(){
         $scope.main.loader = true;
         ExpenseProvider.getExpenseList().then(function(data){
         $scope.main.result = data;
         $scope.main.loader = false;
         });
         }

         $scope.getImage = function(){
         $scope.main.loader = true;
         ImageProvider.getImage().then(function(data){
         $scope.main.result = data;
         $scope.main.loader = false;
         });
         }

         */

      }]);

})();