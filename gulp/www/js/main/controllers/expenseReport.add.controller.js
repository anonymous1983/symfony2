'use strict';

(function () {

  angular.module(G.app.name)
    .controller('ExpenseReportAddController', ['$scope', '$timeout', '$filter', '$state', '$stateParams', 'FixerProvider', '$sessionStorage', 'UtilsProvider', 'ExpenseReportProvider',
      function ($scope, $timeout, $filter, $state, $stateParams, FixerProvider, $sessionStorage, UtilsProvider, ExpenseReportProvider) {


        $scope.expenseReportAdd = {
          obj: {
            expenseReportId: 0,
            expenseReportUserlogin: $sessionStorage.user.username,
            expenseReportDate: new Date(),
            expenseReportModifyDate: new Date(),
            expenseReport_p_justification: '',
            expenseReportPNR: 0,
            expenseReport_p_expense_report_type: '',
            expenseReport_p_in_idf: 'n'
          },

          submit: function () {
            ExpenseReportProvider.addExpenseReport($scope.expenseReportAdd.obj).then(function () {
              if (parseInt($stateParams.p) === 1) {
                $state.go('main.home', {}, {reload: true});
              }
            });
          }

        };


      }]);

})();