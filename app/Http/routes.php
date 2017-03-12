<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware'=>'auth.checkrole:admin','as'=>'admin.'], function(){

    Route::group(['prefix'=>'categorias', 'as'=>'categorias.'], function(){
        Route::get('', ['as' => 'index', 'uses' => 'CategoriesController@index']);
        Route::get('adicionar', ['as' => 'adicionar', 'uses' => 'CategoriesController@create'] );
        Route::get('editar/{id}', ['as' => 'editar', 'uses' => 'CategoriesController@edit'] );
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CategoriesController@update'] );
        Route::post('salvar', ['as' => 'salvar', 'uses' => 'CategoriesController@store'] );
    });

    Route::group(['prefix'=>'produtos', 'as'=>'produtos.'], function(){
        Route::get('', ['as' => 'index', 'uses' => 'ProductsController@index']);
        Route::get('adicionar', ['as' => 'adicionar', 'uses' => 'ProductsController@create'] );
        Route::get('editar/{id}', ['as' => 'editar', 'uses' => 'ProductsController@edit'] );
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ProductsController@update'] );
        Route::post('salvar', ['as' => 'salvar', 'uses' => 'ProductsController@store'] );
        Route::get('deletar/{id}', ['as' => 'deletar', 'uses' => 'ProductsController@destroy'] );
    });

    Route::group(['prefix'=>'clientes', 'as'=>'clientes.'], function(){
        Route::get('', ['as' => 'index', 'uses' => 'ClientsController@index']);
        Route::get('adicionar', ['as' => 'adicionar', 'uses' => 'ClientsController@create'] );
        Route::get('editar/{id}', ['as' => 'editar', 'uses' => 'ClientsController@edit'] );
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ClientsController@update'] );
        Route::post('salvar', ['as' => 'salvar', 'uses' => 'ClientsController@store'] );
        Route::get('deletar/{id}', ['as' => 'deletar', 'uses' => 'ClientsController@destroy'] );
    });

    Route::group(['prefix'=>'pedidos', 'as'=>'pedidos.'], function(){
        Route::get('', ['as' => 'index', 'uses' => 'OrdersController@index']);
        Route::get('adicionar', ['as' => 'adicionar', 'uses' => 'OrdersController@create'] );
        Route::get('editar/{id}', ['as' => 'editar', 'uses' => 'OrdersController@edit'] );
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'OrdersController@update'] );
        Route::post('salvar', ['as' => 'salvar', 'uses' => 'OrdersController@store'] );
        Route::get('deletar/{id}', ['as' => 'deletar', 'uses' => 'OrdersController@destroy'] );
    });

    Route::group(['prefix'=>'cupons', 'as'=>'cupons.'], function(){
        Route::get('', ['as' => 'index', 'uses' => 'CupomsController@index']);
        Route::get('adicionar', ['as' => 'adicionar', 'uses' => 'CupomsController@create'] );
        Route::get('editar/{id}', ['as' => 'editar', 'uses' => 'CupomsController@edit'] );
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'CupomsController@update'] );
        Route::post('salvar', ['as' => 'salvar', 'uses' => 'CupomsController@store'] );
    });

});

Route::group(['prefix'=>'customer', 'middleware'=>'auth.checkrole:client', 'as'=>'customer.'], function(){
    Route::get('order', ['as' => 'order.index', 'uses' => 'CheckoutController@index']);
    Route::get('order/create', ['as' => 'order.create', 'uses' => 'CheckoutController@create']);
    Route::post('order/store', ['as' => 'order.store', 'uses' => 'CheckoutController@store']);
});

Route::group(['middleware' => 'cors'], function() {
    Route::post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });

    Route::group(['prefix'=>'api','middleware'=>'oauth','as'=>'api.'], function(){

        Route::get('authenticated', function() {
            $id = Authorizer::getResourceOwnerId();
            $user = \CodeDelivery\Models\User::find($id);

            return $user;
        });

        Route::group(['prefix'=>'client', 'middleware' => 'oauth.checkrole:client', 'as' => 'client.'], function() {
            Route::resource('order',
                'Api\Client\ClientCheckoutController', [
                    'except' => ['create', 'edit', 'destroy']
                ]);

            Route::resource('products', 'Api\Client\ClientProductController@index');
        });

        Route::group(['prefix'=>'deliveryman', 'middleware' => 'oauth.checkrole:deliveryman', 'as' => 'deliveryman.'], function() {
            Route::resource('order',
                'Api\Deliveryman\DeliverymanCheckoutController', [
                    'except' => ['create', 'edit', 'destroy', 'store']
                ]);

            Route::patch('order/{id}/update-status', [
                'uses' => 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus',
                'as' => 'orders.update_status'
            ]);

        });

        Route::get('cupom/{code}', 'Api\CupomController@show');

    });
});
