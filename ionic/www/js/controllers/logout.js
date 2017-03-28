angular.module('starter.controllers')
    .controller('LogoutController', [
        '$scope', 'OAuthToken', '$state', 'UserData', '$ionicHistory',
        function($scope, OAuthToken, $state, UserData, $ionicHistory) {
            OAuthToken.removeToken();
            UserData.set(null);
            $ionicHistory.clearCache();
            $ionicHistory.clearHistory();
            $ionicHistory.nextViewOptions({
                disableBack: true,
                historyRoot: true
            })
            $state.go('login');
        }]);