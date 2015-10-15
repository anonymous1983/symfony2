/**
 * Created by abid on 31/08/2015.
 */

(function () {

  angular.module(G.app.name)
    .service('ExpenseReportProvider', ['$http', '$q', '$filter', '$sessionStorage', 'apiRest', 'UtilsProvider', function ($http, $q, $filter, $sessionStorage, apiRest, UtilsProvider) {

      var erf = {

        getExpenseReportNextId: function () {
          var defer = $q.defer(),
            params = {
              method: apiRest.expenseReport.getExpenseReportNextId.method,
              url: apiRest.expenseReport.getExpenseReportNextId.url,
              headers: apiRest.expenseReport.getExpenseReportNextId.header,
              data: apiRest.expenseReport.getExpenseReportNextId.data
            };
          $http(params)
            .success(function (data) {
              return defer.resolve(data[0]);
            });

          return defer.promise;
        },

        addExpenseReport: function (expenseReportObj) {

          var
            defer = $q.defer(),
            date = new Date();

          erf.getExpenseReportNextId().then(function (expenseReportNextId) {
            var data_params = UtilsProvider.objectToParams({
                p_report_id: expenseReportNextId.expenseReportId,
                p_pnr: "0",
                p_justification: expenseReportObj.expenseReport_p_justification,
                p_modify_date: $filter('date')(date, 'yyyy-MM-dd HH:mm:ss'),
                p_employe: $sessionStorage.user.username,
                p_draft: "y",
                p_expense_report_type: expenseReportObj.expenseReport_p_expense_report_type,
                p_in_idf: expenseReportObj.expenseReport_p_in_idf,
                p_creation_date: $filter('date')(date, 'yyyy-MM-dd HH:mm:ss')
              }),
              params = {
                method: 'POST',
                url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/addExpenseReport',
                headers: {
                  'Authorization': 'Basic YWJpZDpBZG5lbkAxOTgx',
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: data_params,
                cache: false
              };
            $http(params)
              .success(function (data) {
                // this callback will be called asynchronously
                // when the response is available

                return defer.resolve(data);
                //return 'imgDraftNextId = '+imgDraftNextId;
              });
          });

          return defer.promise;
        },

        submitExpenseReport: function (expenseReportId) {
          var defer = $q.defer(),
            data_params = UtilsProvider.objectToParams({
              p_report_id: expenseReportId
            }),
            params = {
              method: apiRest.expenseReport.submitExpenseReport.method,
              url: apiRest.expenseReport.submitExpenseReport.url,
              headers: apiRest.expenseReport.submitExpenseReport.header,
              data: data_params
            };
          $http(params)
            .success(function (data) {
              // this callback will be called asynchronously
              // when the response is available
              return defer.resolve(data);
            });

          return defer.promise;
        },

        getExpenseReportList: function (draft) {
          var defer = $q.defer(),
            params = {
              method: apiRest.expenseReport.getExpenseReportList.method,
              url: apiRest.expenseReport.getExpenseReportList.url,
              headers: apiRest.expenseReport.getExpenseReportList.header,
              data: apiRest.expenseReport.getExpenseReportList.data
            };
          $http(params)
            .success(function (data) {
              // this callback will be called asynchronously
              // when the response is available
              if (!draft) {
                return defer.resolve(data);
              } else {
                if (draft.toLowerCase() === 'y') {
                  return defer.resolve(erf.datFilter(data, 'y'));
                } else {
                  return defer.resolve(erf.datFilter(data, 'n'));
                }
              }

            });

          return defer.promise;
        },

        datFilter: function (data, draft) {
          var temp = [];
          angular.forEach(data, function (value, key) {
            if (value.expenseReportDraft === draft) {
              temp.push(value);
            }
          });
          return temp;
        },

        getExpenseReportNbAndAmountByUser: function (user_login, expenseReportDraftStatus) {
          var
            status = (!expenseReportDraftStatus) ? 'y' : expenseReportDraftStatus,
            user_login = (!user_login) ? 'asfar_e' : user_login,
            defer = $q.defer(),
            params = {
              method: apiRest.expenseReport.getExpenseReportNbAndAmountByUser.method,
              url: apiRest.expenseReport.getExpenseReportNbAndAmountByUser.url + '&REPORT_DRAFT_STATUS=' + status + '&EMPLOYEE_ID=' + user_login,
              headers: apiRest.expenseReport.getExpenseReportNbAndAmountByUser.header,
              data: apiRest.expenseReport.getExpenseReportNbAndAmountByUser.data
            };

          $http(params)
            .success(function (data) {
              // this callback will be called asynchronously
              // when the response is available
              return defer.resolve(data);

            });

          return defer.promise;
        }

      }

      return {
        getExpenseReportNextId: erf.getExpenseReportNextId,
        addExpenseReport: erf.addExpenseReport,
        getExpenseReportList: erf.getExpenseReportList,
        submitExpenseReport: erf.submitExpenseReport,
        getExpenseReportNbAndAmountByUser: erf.getExpenseReportNbAndAmountByUser
      }

    }])

})();
