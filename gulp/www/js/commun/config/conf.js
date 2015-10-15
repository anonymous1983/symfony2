/**
 * Created by abid on 31/07/2015.
 */

(function () {

  // Configuring Color Intentions
  // Palettes
  /*
   red
   pink
   purple
   deep-purple
   indigo
   blue
   light-blue
   cyan
   teal
   green
   light-green
   lime
   yellow
   amber
   orange
   deep-orange
   brown
   grey
   blue-grey
   */
  angular.module(G.app.name)
    .config(function ($mdThemingProvider) {
      $mdThemingProvider.theme('default')
        .primaryPalette('blue');
    });

  angular.module(G.app.name)
    .constant('config', {
      baseUrl: 'js/'
    });

  angular.module(G.app.name)
    .constant('apiRest', {
      baseUrl: '/',
      expense: {
        getExpenseNextId: {
          method: 'GET',
          url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/getExpenseNextId/?format=json&limit=1',
          header: {
            Authorization: 'Basic YWJpZDpBZG5lbkAxOTgx'
          },
          data: null
        },
        getExpenseImgDraftNextId: {
          method: 'GET',
          url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/getExpenseImgDraftNextId/?format=json',
          header: {
            Authorization: 'Basic YWJpZDpBZG5lbkAxOTgx'
          },
          data: null
        },
        saveExpenseDraft: {
          method: 'POST',
          url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/SaveExpenseDraft',
          header: {
            Authorization: 'Basic YWJpZDpBZG5lbkAxOTgx',
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          data: null
        }

      },
      expenseReport: {
        getExpenseReportNextId: {
          method: 'GET',
          url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/getExpenseReportNextId/?format=json&limit=10',
          header: {
            Authorization: 'Basic YWJpZDpBZG5lbkAxOTgx'
          },
          data: null
        },
        getExpenseReportList: {
          method: 'GET',
          url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/getExpenseReportList/?format=json&limit=10&p_employe=asfar_e',
          header: {
            Authorization: 'Basic YWJpZDpBZG5lbkAxOTgx'
          },
          data: null
        },
        submitExpenseReport: {
          method: 'POST',
          url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/SubmitExpenseReport',
          header: {
            Authorization: 'Basic YWJpZDpBZG5lbkAxOTgx',
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          data: null
        },
        getExpenseReportNbAndAmountByUser: {
          method: 'GET',
          url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/getExpenseReportNbAndAmountByUser/?format=json&limit=10',
          header: {
            Authorization: 'Basic YWJpZDpBZG5lbkAxOTgx'
          },
          data: null
        }

      }
    });

})();
