'use strict';

(function () {

  angular.module(G.app.name)
    .controller('ExpenseAddController', ['$scope', '$timeout', '$filter', '$state', '$stateParams', '$sessionStorage', 'ExpenseProvider', 'FixerProvider', 'ExpenseReportList', 'CryptoProvider', 'UtilsProvider',
      function ($scope, $timeout, $filter, $state, $stateParams, $sessionStorage, ExpenseProvider, FixerProvider, ExpenseReportList, CryptoProvider, UtilsProvider) {

        $scope.expenseReport = {
          expenseReportList: ExpenseReportList
        };

        $scope.constantExpenseType = $scope.main.constantExpenseReasonInIleDeFrance;

        $scope.expense = {

          obj: {
            expense_p_report_id: window.atob($stateParams.expenseReportId),
            expense_p_expense_id: 0,
            expense_p_expense_type: '',
            expense_p_exchange_rate: "1",
            expense_p_justification: 'Taxi',
            expense_p_begin_date: $filter('date')(new Date(), 'dd/MM/yyyy') ,
            expense_p_currency: '',
            expense_p_end_date: $filter('date')(new Date(), 'dd/MM/yyyy'),
            expense_p_img_justif: $sessionStorage.paramsPicture,
            expense_p_draft: "y",
            expense_p_amount: 0
          },

          submit: function () {
            ExpenseProvider.addExpense($scope.expense.obj).then(function () {
              $state.go('main.home', {}, {reload: true});
            });
          },

          getRatesBase: function () {
            if ($scope.expense.obj.expense_p_currency) {
              FixerProvider.getRatesBase($scope.expense.obj.expense_p_currency).then(function (data) {
                FixerProvider.setFixer(data);
                $scope.expense.obj.expenseChangeRate = FixerProvider.getEuroRates();
                $scope.expense.obj.expense_p_amountConverted = FixerProvider.getAmountConverted($scope.expense.obj.expense_p_amount);
              });
            }
          },

          getImage: function (e) {
            console.log(e);
          }

        };

        $scope.getImage = function (e) {
          console.log(e);
        }

      }]);

})();