angular.module('starter.run').run(['PermissionStore', 'OAuth', 'UserData', 'RoleStore',
    function (PermissionStore, OAuth, UserData, RoleStore) {
    PermissionStore.definePermission('user-permission', function () {
        return OAuth.isAuthenticated();
    });

    PermissionStore.definePermission('client-permission', function () {
        var user = UserData.get();
        if(user == null || !user.hasOwnProperty('role')) {
            return false;
        }
        return user.role == 'client';
    });
    RoleStore.defineRole('client-role', ['user-permission', 'client-permission']);

    PermissionStore.definePermission('deliveryman-permission', function () {
        var user = UserData.get();
        if(user == null || !user.hasOwnProperty('role')) {
            return false;
        }
        return user.role == 'deliveryman';
    });
    RoleStore.defineRole('deliveryman-role', ['user-permission', 'deliveryman-permission']);
}]);