angular.module('starter.controllers')
    .controller('ClientViewDeliveryCtrl', [
        '$scope',  '$stateParams', 'ClientOrder', '$ionicLoading', 'UserData', '$ionicPopup', '$pusher', '$window',
        function($scope, $stateParams, ClientOrder, $ionicLoading, UserData, $ionicPopup, $pusher, $window) {

            var iconUrl = 'http://maps.google.com/mapfiles/kml/pal2';

            $scope.order = [];
            $scope.map = {
                center: {
                    latitude: 0,
                    longitude: 0
                },
                zoom: 12
            };

            $scope.markers = [];

            $ionicLoading.show({
                template: 'Carregando...'
            });

            ClientOrder.get({id: $stateParams.id, include: "items,cupom"}, function(data) {
                $scope.order = data.data;
                $ionicLoading.hide();
                if(parseInt($scope.order.status, 10) == 1) {
                    initMarkers($scope.order);
                } else {
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'O pedido não está em status de entrega.'
                    });
                }
            }, function(dataError) {
                $ionicLoading.hide();
            });

            $scope.$watch('markers.length', function (value) {
                if (value == 2) {
                    createBounds();
                }
            })

            function  initMarkers(order) {
                var client = UserData.get().client.data,
                    address =
                        client.zipcode + ', ' +
                        client.address + ', ' +
                        client.city + ' - ' +
                        client.state;
                console.log(address);
                createMarkerClient(address);
                watchPositionDeliveryman(order.hash);
            };

            function createMarkerClient(address) {
                var geocorder = new google.maps.Geocoder();
                geocorder.geocode({
                    address: address
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var lat = results[0].geometry.location.lat(),
                            long = results[0].geometry.location.lng();

                        $scope.markers.push({
                            id: 'client',
                            coords: {
                                latitude: lat,
                                longitude: long
                            },
                            options: {
                                title: "Endereço do cliente",
                                icon: iconUrl + "/icon2.png"
                            }
                        });

                    } else {
                        $ionicPopup.alert({
                            title: 'Advertência',
                            template: 'Não foi possível encontrar seu endereço.'
                        });
                    }
                })
            };

            function watchPositionDeliveryman(channel) {
                var pusher = $pusher($window.client);
                var channel = pusher.subscribe(channel);

                channel.bind('CodeDelivery\\Events\\GetLocationDeliveryman', function (data) {
                    var lat = data.geo.lat;
                    var long = data.geo.long;

                    if ($scope.markers.length == 1 || $scope.markers.length == 1) {
                        $scope.markers.push({
                            id: 'entregador',
                            coords: {
                                latitude: lat,
                                longitude: long
                            },
                            options: {
                                title: "Entregador",
                                icon: iconUrl + "/icon47.png"
                            }
                        });
                        return;
                    }

                    for (var key in $scope.markers) {
                        if ($scope.markers[key].id == 'entregador') {
                            $scope.markers[key].coords = {
                                latitude: lat,
                                longitude: long
                            }
                        }
                    }
                })
            }

            function createBounds() {
                var bounds = new google.maps.LatLngBounds();
                var latlng;

                angular.forEach($scope.markers, function (value) {
                    latlng = new google.maps.LatLng(Number(value.coords.latitude), Number(value.coords.longitude));
                    bounds.extend(latlng);
                });

                $scope.map.bounds = {
                    northeast: {
                        latitude: bounds.getNorthEast().lat(),
                        longitude: bounds.getNorthEast().lng()
                    },
                    southwest: {
                        latitude: bounds.getSouthWest().lat(),
                        longitude: bounds.getSouthWest().lng()
                    }
                }
            }

        }]);