/**
 * Created by abid on 31/08/2015.
 */

(function () {

  angular.module(G.app.name)
    .service('ExpenseProvider', ['$http', '$q', '$filter', 'apiRest', 'UtilsProvider', '$sessionStorage',
      function ($http, $q, $filter, apiRest, UtilsProvider, $sessionStorage) {

        var ef = {

          getExpenseNextId: function () {
            var defer = $q.defer();
            var parms = {
              method: apiRest.expense.getExpenseNextId.method,
              url: apiRest.expense.getExpenseNextId.url,
              headers: apiRest.expense.getExpenseNextId.header,
              data: apiRest.expense.getExpenseNextId.data
            };
            $http(parms)
              .success(function (data) {
                // this callback will be called asynchronously
                // when the response is available

                return defer.resolve(data[0]);
              });

            return defer.promise;
          },

          getExpenseImgDraftNextId: function () {
            var defer = $q.defer();
            var parms = {
              method: apiRest.expense.getExpenseNextId.method,
              url: apiRest.expense.getExpenseNextId.url,
              headers: apiRest.expense.getExpenseNextId.header,
              data: apiRest.expense.getExpenseNextId.data
            };
            $http(parms)
              .success(function (data) {
                // this callback will be called asynchronously
                // when the response is available

                return defer.resolve(data[0]);
              });

            return defer.promise;
          },

          addExpense: function (expenseObj) {

            var
              defer = $q.defer(),
              date = new Date();

            ef.getExpenseNextId().then(function (expenseNextId) {

              var data_params = UtilsProvider.objectToParams({
                  p_report_id: expenseObj.expense_p_report_id,
                  p_expense_id: expenseNextId.expenseId,
                  p_expense_type: expenseObj.expense_p_expense_type,
                  p_exchange_rate: "1",
                  p_justification: expenseObj.expense_p_justification,
                  p_begin_date: $filter('date')(date, 'yyyy-MM-dd HH:mm:ss'),
                  p_currency: expenseObj.expense_p_currency,
                  p_end_date: $filter('date')(date, 'yyyy-MM-dd HH:mm:ss'),
                  p_img_justif: expenseObj.expense_p_img_justif.hex,
                  p_draft: "y",
                  p_amount: expenseObj.expense_p_amount
                }),
                params = {
                  method: 'POST',
                  url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/addExpense',
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
                  ef.saveExpenseDraft( expenseObj.expense_p_report_id, expenseNextId.expenseId).then(function (greeting) {
                    return defer.resolve(data);
                  }, function (error) {
                    console.log('error saveExpenseDraft : ' + error);
                  });

                  //return 'imgDraftNextId = '+imgDraftNextId;
                });

            });

            return defer.promise;

          },

          addExpenseImgDraft: function (picture) {

            var defer = $q.defer();
            ef.getExpenseImgDraftNextId().then(function (imgDraftNextId) {

              var data_pram = UtilsProvider.objectToParams({
                p_img_justif: picture.hex,
                p_employe: $sessionStorage.user.username,
                p_exp_img_id: imgDraftNextId.expenseId
              });
              var parms = {
                method: 'POST',
                url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/addExpenseImgDraft',
                headers: {
                  'Authorization': 'Basic YWJpZDpBZG5lbkAxOTgx',
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: data_pram
              };
              $http(parms)
                .success(function (data) {
                  // this callback will be called asynchronously
                  // when the response is available

                  return defer.resolve(data);
                  //return 'imgDraftNextId = '+imgDraftNextId;
                });
            });

            return defer.promise;

          },

          saveExpenseDraft: function (expenseReportId, expenseId) {
            var defer = $q.defer(),
              data_params = UtilsProvider.objectToParams({
                p_report_id: expenseReportId,
                p_expense_id: expenseId
              }),
              params = {
                method: apiRest.expense.saveExpenseDraft.method,
                url: apiRest.expense.saveExpenseDraft.url,
                headers: apiRest.expense.saveExpenseDraft.header,
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

          getExpenseList: function () {

            var defer = $q.defer();
            var parms = {
              method: "GET",
              url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/GetExpenseList/?format=json&limit=10&userLogin=asfar_e',
              headers: {
                'Authorization': 'Basic YWJpZDpBZG5lbkAxOTgx'
              }
            };
            $http(parms)
              .success(function (data) {
                // this callback will be called asynchronously
                // when the response is available

                return defer.resolve(data);
              });

            return defer.promise;

          }

        }

        return {
          getExpenseNextId: ef.getExpenseNextId,
          addExpense: ef.addExpense,
          addExpenseImgDraft: ef.addExpenseImgDraft,
          getExpenseList: ef.getExpenseList,
          saveExpenseDraft: ef.saveExpenseDraft
        }

      }])

})();
