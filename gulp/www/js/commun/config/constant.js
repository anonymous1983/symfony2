/**
 * Created by abid on 31/07/2015.
 */

(function () {

  angular.module(G.app.name)
    .constant('constantGlobal', {
      global: {
        currency: [
          {
            id: 1,
            label: "EUR"
          },
          {
            id: 2,
            label: "AUD"
          },
          {
            id: 3,
            label: "BGN"
          },
          {
            id: 4,
            label: "BRL"
          },
          {
            id: 6,
            label: "CAD"
          },
          {
            id: 7,
            label: "CHF"
          },
          {
            id: 8,
            label: "CNY"
          },
          {
            id: 9,
            label: "CZK"
          },
          {
            id: 10,
            label: "DKK"
          },
          {
            id: 11,
            label: "HKD"
          },
          {
            id: 12,
            label: "HRK"
          },
          {
            id: 13,
            label: "HUF"
          },
          {
            id: 14,
            label: "IDR"
          },
          {
            id: 15,
            label: "ILS"
          },
          {
            id: 16,
            label: "INR"
          },
          {
            id: 17,
            label: "JPY"
          },
          {
            id: 18,
            label: "KRW"
          },
          {
            id: 19,
            label: "MXN"
          },
          {
            id: 20,
            label: "MYR"
          },
          {
            id: 21,
            label: "NOK"
          },
          {
            id: 22,
            label: "NZD"
          },
          {
            id: 23,
            label: "PHP"
          },
          {
            id: 24,
            label: "PLN"
          },
          {
            id: 25,
            label: "RON"
          },
          {
            id: 26,
            label: "RUB"
          },
          {
            id: 27,
            label: "SEK"
          },
          {
            id: 28,
            label: "SGD"
          },
          {
            id: 29,
            label: "THB"
          },
          {
            id: 30,
            label: "TRY"
          },
          {
            id: 31,
            label: "USD"
          },
          {
            id: 32,
            label: "ZAR"
          }
        ]
      }
    });

  angular.module(G.app.name)
    .constant('constantBill', {
      motif: [
        {
          id: 1,
          code: 'VPC',
          description: 'Visite propect/Client',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 2,
          code: 'VFI',
          description: 'Visite Filiale',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 3,
          code: 'RPA',
          description: 'Repas d’affaires',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 4,
          code: 'REU',
          description: 'Réunion',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 5,
          code: 'SEM',
          description: 'Séminaire/Conférence/Colloque',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 6,
          code: 'FOR',
          description: 'Formation',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 7,
          code: 'DEJ',
          description: 'Déjeuner d’équipes',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 8,
          code: 'PSI',
          description: 'PCA/PRU',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        },
        {
          id: 9,
          code: 'DIV',
          description: 'Autre',
          icon: {
            type: 'Font-Awesome',
            value: 'fa fa-tag'
          }
        }
      ]
    });

  angular.module(G.app.name)
    .constant('constantExpense', {
      type: {
        inIleDeFrance: [
          {
            id: 1,
            code: 'HOTL',
            description: 'Hôtel',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 2,
            code: 'CARB',
            description: 'Carburant (Voiture Société)',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 3,
            code: 'TAXI',
            description: 'Taxi',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 4,
            code: 'LOCV',
            description: 'Location voiture',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 5,
            code: 'AVIO',
            description: 'Avion',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 6,
            code: 'VISA',
            description: 'Frais de Visa',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 7,
            code: 'RESI',
            description: 'Restaurant (Collaborateur AMUNDI)',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 8,
            code: 'RESX',
            description: 'Restaurant (Collaborateur AMUNDI + Pers. externe)',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 9,
            code: 'KILO',
            description: 'Frais Kilométriques',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 10,
            code: 'TRPT',
            description: 'Péage/Parking/Transport en commun',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 11,
            code: 'CADX',
            description: 'Cadeaux',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 12,
            code: 'INSC',
            description: 'Inscription Séminaire/Conférence/Colloque',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 13,
            code: 'AUTR',
            description: 'Autres frais',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          }
        ],
        outIleDeFrance: [
          {
            id: 1,
            code: 'HOTL',
            description: 'Hôtel',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 2,
            code: 'CARB',
            description: 'Carburant (Voiture Société)',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 3,
            code: 'TAXI',
            description: 'Taxi',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 4,
            code: 'LOCV',
            description: 'Location voiture',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 5,
            code: 'RESI',
            description: 'Restaurant (Collaborateur AMUNDI)',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 6,
            code: 'RESX',
            description: 'Restaurant (Collaborateur AMUNDI + Pers. externe)',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 7,
            code: 'KILO',
            description: 'Frais Kilométriques',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 8,
            code: 'TRPT',
            description: 'Péage/Parking/Transport en commun',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 9,
            code: 'CADX',
            description: 'Cadeaux',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 10,
            code: 'INSC',
            description: 'Inscription Séminaire/Conférence/Colloque',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 11,
            code: 'AUTR',
            description: 'Autres frais',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 12,
            code: 'ENTR',
            description: 'Entretien véhicules sociétés',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          },
          {
            id: 13,
            code: 'COTI',
            description: 'Cotisation SFAF ou CFA',
            icon: {
              type: 'Font-Awesome',
              value: 'fa fa-tag'
            }
          }
        ]
      }

    });

  angular.module(G.app.name)
    .constant('constantUser', {
      username: ['test', 'abid', 'forget', 'asfar_e']
    });

})();