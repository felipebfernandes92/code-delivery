angular.module('starter.controllers')
    .controller('DeliverymanOrderCtrl', [
        '$scope', '$state', 'DeliverymanOrder', '$ionicLoading',
        function ($scope, $state, DeliverymanOrder, $ionicLoading) {

            $scope.orders = {};
            $ionicLoading.show({
                template: 'Carregando...'
            });

            $scope.doRefresh = function () {
                getOrders().then(function(data) {
                    $scope.orders = data.data;
                    $scope.$broadcast('scroll.refreshComplete');
                }, function(dataError) {
                    $scope.$broadcast('scroll.refreshComplete');
                });;
            };

            $scope.openOrderDetail = function (order) {
                $state.go('deliveryman.view_order', {id: order.id});
            };

            $scope.colorStatus = function (status) {
                switch (status) {
                    case 'Pendente':
                        return 'energized';
                        break;
                    case 'A caminho':
                        return 'positive'
                        break;
                    case 'Entregue':
                        return 'balanced'
                        break;
                    default:
                        return 'assertive'
                }
            };


            function getOrders() {
                return DeliverymanOrder.query({
                    id: null,
                    orderBy: 'created_at',
                    sortedBy: 'desc'
                }).$promise;
            };

            getOrders().then(function(data) {
                $scope.orders = data.data;
                $ionicLoading.hide();
            }, function(dataError) {
                $ionicLoading.hide();
            });
        }]);