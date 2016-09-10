angular.module('starter.controllers')
    .controller('HomeCtrl', ['$scope', 'appConfig', '$resource', function($scope, appConfig, $resource) {
        var query = $resource(appConfig.baseUrl + '/api/authenticated',{},{
            query: {
                isArray: false
            }
        });

        query.query({}, function(data) {
            $scope.name =  data.name;
        }, function(dataError) {
        });
    }]);