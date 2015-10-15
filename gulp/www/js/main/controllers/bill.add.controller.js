'use strict';

(function () {

  angular.module(G.app.name)
    .controller('BillAddController', ['$scope', '$timeout', '$filter',
      function ($scope, $timeout, $filter) {

        $scope.bill = {
          obj: {
            expenseReportBeginDate: new Date(),
            expenseReportEndDate: new Date()
          }
        };


      }]);

})();