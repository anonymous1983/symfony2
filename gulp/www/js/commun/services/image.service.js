/**
 * Created by abid on 31/08/2015.
 */

(function () {

  angular.module(G.app.name)
    .service('ImageProvider', ['$http', '$q', function ($http, $q) {

      var imagef = {

        getImage: function () {

          var defer = $q.defer();
          var parms = {
            method: "GET",
            url: 'http://dev-smartservices-it.intramundi.com/smsit/api/queries/exec/SELECT_BINARY/?format=json',
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
        getImage: imagef.getImage
      }

    }])

})();
