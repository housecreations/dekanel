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


Route::auth();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'AdminController@index']);

    Route::post('/carousel', [
        'as' => 'admin.carousel.store',
        'uses' => 'AdminController@storeCarousel']);

    Route::put('/carousel', [
        'as' => 'admin.carousel.update',
        'uses' => 'AdminController@updateCarousel']);

    Route::delete('/carousel', [
        'as' => 'admin.carousel.destroy',
        'uses' => 'AdminController@destroyCarousel']);

    Route::resource('consultants', 'ConsultantsController');
    Route::resource('clients', 'ClientsController');
    Route::resource('configuration', 'ApplicationInformationsController');
    Route::resource('products', 'ProductsController');

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


