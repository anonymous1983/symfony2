/**
 * Created by abid on 31/08/2015.
 */

(function () {

  angular.module(G.app.name)
    .service('UtilsProvider', ['$http', '$q', 'constantBill',
      function ($http, $q, constantBill) {

        var uf = {
          getMotifBillByCode: function (code) {
            var motifList = constantBill.motif;
            for (var i = 0; i < motifList.length; i++) {
              if (motifList[i].code === code) {
                return motifList[i];
              }
            }
            return true;
          },
          objectToParams: function ObjecttoParams (obj) {
            var p = [];
            for (var key in obj) {
              p.push(key + '=' + encodeURIComponent(obj[key]));
            }
            return p.join('&');
          }
        }

        return {
          getMotifBillByCode: uf.getMotifBillByCode,
          objectToParams: uf.objectToParams
        }

      }])

})();
