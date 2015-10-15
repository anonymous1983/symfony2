'use strict';

(function () {

  angular.module(G.app.name)
    .controller('HomeController', ['$scope', '$rootScope', '$state', '$sessionStorage', 'ExpenseReportList', 'ExpenseReportProvider', 'ExpenseReportNbAndAmount',
      function ($scope, $rootScope, $state, $sessionStorage, ExpenseReportList, ExpenseReportProvider, ExpenseReportNbAndAmount) {

        var arraySubmit = [];

        $scope.home = {
          expenseBillPicture: null,
          expenseReportList: ExpenseReportList,
          expenseReportNbAndAmount: ExpenseReportNbAndAmount[0],
          draft: {
            nbOfExpenseReport: parseInt(ExpenseReportNbAndAmount[0].nbOfExpenseReport),
            expenseReportTotal: ExpenseReportNbAndAmount[0].expenseReportTotal.split('.')
          },
          expenseReportSubmit: function (id, index) {

            //if (arraySubmit.indexOf(id) != -1) {
              // Test if the ExpenseReport is already subject
              arraySubmit.push(id);
              angular.element(document.querySelector('#item-expense-report-id-' + index + ' .btn-submit-report ')).addClass(' fa-spinner fa-spin ');
              ExpenseReportProvider.submitExpenseReport(id).then(function () {
                angular.element(document.querySelector('#item-expense-report-id-' + index)).addClass('ng-hide');
              });
            //}

          }
        };

        $scope.$watch('home.expenseBillPicture', function (newValue) {
          if (newValue) {
            $rootScope.picture = $scope.home.expenseBillPicture;
            $sessionStorage.picture = $scope.home.expenseBillPicture;
            $state.go('main.scan', {}, {reload: true});
          }
        });


      }]);

})();