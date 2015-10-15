/**
 * Created by abid on 31/08/2015.
 */

(function () {

  angular.module(G.app.name)
    .service('UserProvider', ['$http', '$q', 'constantUser', function ($http, $q, constantUser) {

      var uf = {

        login: function () {

          var defer = $q.defer();
          var parms = {
            method: "POST",
            url: 'URL:http://dev-smartservices-it.intramundi.com/smsit/api/auth/login/',
            headers: {
              'Authorization': 'Basic YWJpZDpBZG5lbkAxOTgx'
            },
            data: {
              login: 'abid',
              password: 'xxxxx'
            }
          };
          $http(parms)
            .success(function (data) {
              // this callback will be called asynchronously
              // when the response is available

              return defer.resolve(data);
            });

          return defer.promise;

        },
        checkUsername: function (username) {
          return constantUser.username.indexOf(username) != -1;
        }

      }

      return {
        login: uf.login,
        checkUsername: uf.checkUsername
      }

    }])

})();
