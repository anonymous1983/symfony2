'use strict';

(function () {

  angular.module(G.app.name)
    .controller('ExpenseReportListController', ['$scope', '$stateParams', '$timeout', '$filter', '$state', '$sessionStorage', 'FixerProvider', 'ExpenseReportList', 'StateParams',
      function ($scope, $stateParams, $timeout, $filter, $state, $sessionStorage, FixerProvider, ExpenseReportList, StateParams) {

        $scope.expenseReportList = {
          showPicture: parseInt($stateParams.p),
          scanPicture: $sessionStorage.paramsPicture,
          expenseReportList: ExpenseReportList,
          selectExpenseReport: function (expenseReportId) {
            $state.go('main.expenseAdd', {
              expenseReportId: window.btoa(expenseReportId)
            }, {reload: true});
            return true;
          }
        };

      }]);

})();