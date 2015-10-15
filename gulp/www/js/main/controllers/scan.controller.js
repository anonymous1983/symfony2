'use strict';

(function () {

  angular.module(G.app.name)
    .controller('ScanController', ['$scope', '$rootScope', '$state', '$sessionStorage', 'ExpenseProvider', 'UtilsProvider',
      function ($scope, $rootScope, $state, $sessionStorage, ExpenseProvider, UtilsProvider) {
        var updatePicture = true;
        $scope.scan = {
          picture: $sessionStorage.picture,

          saveDraft: function () {
            if (updatePicture) {
              ExpenseProvider.addExpenseImgDraft($scope.scan.picture);
              updatePicture = false;
            }
            return true;
          },

          submitDraft: function () {
            $state.params = {picture: $scope.scan.picture};
            $sessionStorage.paramsPicture = $scope.scan.picture;
            $state.go('main.expenseReportList', {
              p: 1
            }, {reload: true});
            return true;
          }

        };

        $scope.$watch('scan.picture', function (newValue, lastValue) {
          if (newValue) {
            $rootScope.picture = $sessionStorage.picture = $scope.scan.picture;
            updatePicture = true;
          }
        });

      }]);

})();