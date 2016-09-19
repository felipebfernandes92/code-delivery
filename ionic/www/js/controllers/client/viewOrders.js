angular.module('starter.controllers')
    .controller('ClientViewOrdersCtrl', [
        '$scope', '$stateParams', 'Order', '$ionicLoading',
        function ($scope, $stateParams, Order, $ionicLoading) {

            $scope.orders = {};
            $ionicLoading.show({
                template: 'Carregando...'
            });

            Order.get({id: $stateParams.id, include: "items,cupom"}, function(data) {
                console.log(data.data);
                $scope.orders = data.data;
                $ionicLoading.hide();
            }, function(dataError) {
                $ionicLoading.hide();
            });
        }
    ])