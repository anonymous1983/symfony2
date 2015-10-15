'use strict';

(function () {

  angular.module(G.app.name)
    .service('ContributorFactory', ['$http', '$q', '$location',
      function ($http, $q, $location) {

        var cf = {

          contributorOwner: function () {

            var defer = $q.defer();
            var parms = {
              method: "GET",
              //url: $location.protocol() + '://' + $location.host() + '/contributor.json'
              url: 'http://localhost:3000/user'
            };
            $http(parms)
              .success(function (data) {
                // this callback will be called asynchronously
                // when the response is available

                return defer.resolve(data);
              });

            return defer.promise;

          }

        };

        return {
          contributorOwner: cf.contributorOwner
        };

      }
    ]);

})();