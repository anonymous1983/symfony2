'use strict';

var G = {
  app: {
    name: 'flyingBillApp'
  }
};

(function () {

  angular.module(G.app.name, [
    'ui.router',
    'ngMaterial',
    'ngStorage'
  ])
  

    .config(['$stateProvider', '$urlRouterProvider', '$httpProvider', '$locationProvider', '$compileProvider',
      function ($stateProvider, $urlRouterProvider, $httpProvider, $locationProvider, $compileProvider) {

        $stateProvider
          .state('dashboard', {
            url: '/dashboard',
            controller: 'DashboardController',
            templateUrl: 'js/dashboard/templates/dashboard.html'
          })
          .state('login', {
            url: '/login',
            controller: 'LogInController',
            templateUrl: 'js/login/templates/login.html'
          })
          .state('main', {
            abstract: true,
            url: '/main',
            controller: 'MainController',
            templateUrl: 'js/main/templates/main.html'
          })
          .state('main.home', {
            url: '/home',
            views: {
              'viewPageContainerHeader': {
                templateUrl: 'js/main/templates/header.html'
              },
              'viewPageContainerBodyCenter': {
                controller: 'HomeController',
                templateUrl: 'js/main/templates/home.html',
                resolve: {
                  ExpenseReportNbAndAmount: ['ExpenseReportProvider', function (ExpenseReportProvider) {
                    return ExpenseReportProvider.getExpenseReportNbAndAmountByUser('asfar_e', 'y');
                  }],
                  ExpenseReportList: ['ExpenseReportProvider', function (ExpenseReportProvider) {
                    return ExpenseReportProvider.getExpenseReportList('y');
                  }]
                }
              }
            }
          })
          .state('main.scan', {
            url: '/scan',
            views: {
              'viewPageContainerHeader': {
                templateUrl: 'js/main/templates/header.html'
              },
              'viewPageContainerBodyCenter': {
                controller: 'ScanController',
                templateUrl: 'js/main/templates/body/scan.html'
              }
            }
          })
          .state('main.expenseReportList', {
            url: '/expense-report/list?:p',
            views: {
              'viewPageContainerHeader': {
                templateUrl: 'js/main/templates/header.html'
              },
              'viewPageContainerBodyCenter': {
                controller: 'ExpenseReportListController',
                templateUrl: 'js/main/templates/body/bill/list.body.html',
                resolve: {
                  StateParams: ['$state', function ($state) {
                    return $state.params;
                  }],
                  ExpenseReportList: ['ExpenseReportProvider', function (ExpenseReportProvider) {
                    return ExpenseReportProvider.getExpenseReportList();
                  }]
                }
              }
            }
          })
          .state('main.expenseReportAdd', {
            url: '/expense-report/add?:p',
            views: {
              'viewPageContainerHeader': {
                templateUrl: 'js/main/templates/header.html'
              },
              'viewPageContainerBodyCenter': {
                controller: 'ExpenseReportAddController',
                templateUrl: 'js/main/templates/body/bill/add.body.html'
              }
            }
          })
          .state('main.expenseAdd', {
            url: '/expense/add/:expenseReportId',
            views: {
              'viewPageContainerHeader': {
                templateUrl: 'js/main/templates/header.html'
              },
              'viewPageContainerBodyCenter': {
                controller: 'ExpenseAddController',
                templateUrl: 'js/main/templates/body/expense/add.body.html',
                resolve: {
                  ExpenseReportList: ['ExpenseReportProvider', function (ExpenseReportProvider) {
                    return ExpenseReportProvider.getExpenseReportList();
                  }]
                }
              }
            }
          })
          .state('main.billAdd', {
            url: '/bill/add',
            views: {
              'viewPageContainerHeader': {
                templateUrl: 'js/main/templates/header.html'
              },
              'viewPageContainerBodyCenter': {
                controller: 'BillAddController',
                templateUrl: 'js/main/templates/body/bill/add.body.html'
              }
            }
          })
        ;
        //$urlRouterProvider.otherwise('/main/home');
        $urlRouterProvider.otherwise('login');

        $locationProvider.html5Mode(false);
        $compileProvider.debugInfoEnabled(false);
      }])

    .run();

})();