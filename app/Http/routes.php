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

Route::get('/', [
    'uses' => 'HomeController@index']);

Route::get('/products/{slug}', [
    'as' => 'products.show',
    'uses' => 'HomeController@productShow']);


Route::auth();

Route::get('/register', function (){

    return redirect('/');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'AdminController@index']);



    Route::get('/carousel/{id}', [
        'as' => 'admin.carousel.show',
        'uses' => 'AdminController@show']);


    Route::post('/carousel', [
        'as' => 'admin.carousel.store',
        'uses' => 'AdminController@storeCarousel']);

    Route::put('/carousel', [
        'as' => 'admin.carousel.update',
        'uses' => 'AdminController@updateCarousel']);

    Route::delete('/carousel', [
        'as' => 'admin.carousel.destroy',
        'uses' => 'AdminController@destroyCarousel']);

    Route::post('/carousel/change', [
            'as' => 'admin.carousel.change',
            'uses' => 'AdminController@changePosition']);

    Route::post('/carousel/change-color', [
        'as' => 'admin.carousel.change-color',
        'uses' => 'AdminController@changeColor']);

    Route::resource('consultants', 'ConsultantsController');

    Route::post('/consultants/change', [
        'as' => 'admin.consultants.change',
        'uses' => 'ConsultantsController@changePosition']);

    Route::resource('clients', 'ClientsController');

    Route::post('/clients/change', [
        'as' => 'admin.clients.change',
        'uses' => 'ClientsController@changePosition']);

    Route::resource('configuration', 'ApplicationInformationsController');
    Route::resource('products', 'ProductsController');

    Route::post('/products/change', [
        'as' => 'admin.products.change',
        'uses' => 'ProductsController@changePosition']);

    Route::post('/workshops/change', [
        'as' => 'admin.products.workshops.change',
        'uses' => 'TopicsController@changePosition']);

    Route::group(['prefix' => 'products'], function () {

        Route::get('/workshops/{id}', [
            'as' => 'admin.products.workshops.index',
            'uses' => 'TopicsController@index']);

        Route::post('/workshops/', [
            'as' => 'admin.products.workshops.store',
            'uses' => 'TopicsController@store']);

        Route::get('/workshops/show/{id}', [
            'as' => 'admin.products.workshops.show',
            'uses' => 'TopicsController@show']);

        Route::put('/workshops/{id}', [
            'as' => 'admin.products.workshops.update',
            'uses' => 'TopicsController@update']);

        Route::delete('/workshops/{id}', [
            'as' => 'admin.products.workshops.destroy',
            'uses' => 'TopicsController@destroy']);



        Route::get('/workshops/description/{id}', [
            'uses' => 'TopicsController@showDescription']);

        Route::put('/workshops/description/{id}', [
            'as' => 'admin.products.workshops.descriptions.update',
            'uses' => 'TopicsController@updateDescription']);




    });

});


