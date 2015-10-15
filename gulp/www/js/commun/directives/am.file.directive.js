'use strict';

(function() {

  angular.module(G.app.name)
    .directive('amFile', ['CryptoProvider', function(CryptoProvider) {

      return {
        restrict: 'E',
        template: '<input type="file" />',
        replace: true,
        require: 'ngModel',
        link: function(scope, element, attr, ctrl) {

          var listener = function() {
            scope.$apply(function() {

              var FR = new FileReader();
              FR.onload = function (e) {
                var dataImg = e.target.result;
                var dataBase64 = dataImg.match(RegExp(",.*", "g")).toString().substr(1);
                var dataBaseHex = CryptoProvider.util.bytesToHex(CryptoProvider.util.base64ToBytes(dataBase64));
                var data = {
                  img: dataImg,
                  base64: dataBase64,
                  hex: dataBaseHex,
                  file: {
                    lastModified: element[0].files[0].lastModified,
                    name: element[0].files[0].name,
                    size: element[0].files[0].size,
                    type: element[0].files[0].type,
                    webkitRelativePath: element[0].files[0].webkitRelativePath
                  }
                };

                ctrl.$setViewValue(data);

              };
              FR.readAsDataURL(element[0].files[0]);

              //attr.multiple ? ctrl.$setViewValue(element[0].files) : ctrl.$setViewValue(element[0].files[0]);
            });
          }
          element.bind('change', listener);
        }
      };

    }]);

})();