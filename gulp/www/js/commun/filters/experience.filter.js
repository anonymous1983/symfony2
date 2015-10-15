'use strict';

(function () {
  angular.module(G.app.name)
    .filter('experience', [function () {
      return function (input) {
        if (parseInt(input, 10) <= 1)
          return input + ' year experience';
        else
          return input + ' years experience';
      }
    }]);
})();