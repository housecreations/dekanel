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

    $initial_config = App\ApplicationInformation::all();

    if ($initial_config->isEmpty()){

       $initial_config = new App\ApplicationInformation();
       $initial_config->option = 'title';
       $initial_config->value = '';
       $initial_config->label = 'Título de la página';
       $initial_config->save();


        $initial_config = new App\ApplicationInformation();
        $initial_config->option = 'address';
        $initial_config->value = '';
        $initial_config->label = 'Dirección';
        $initial_config->save();

        $initial_config = new App\ApplicationInformation();
        $initial_config->option = 'logo_url';
        $initial_config->value = '';
        $initial_config->label = 'Logo de la página';
        $initial_config->save();

        $initial_config = new App\ApplicationInformation();
        $initial_config->option = 'phone_number';
        $initial_config->value = '';
        $initial_config->label = 'Teléfono';
        $initial_config->save();

        $initial_config = new App\ApplicationInformation();
        $initial_config->option = 'email';
        $initial_config->value = '';
        $initial_config->label = 'Correo electrónico';
        $initial_config->save();

        $initial_config = new App\ApplicationInformation();
        $initial_config->option = 'facebook_url';
        $initial_config->value = '';
        $initial_config->label = 'Página de Facebook';
        $initial_config->save();

        $initial_config = new App\ApplicationInformation();
        $initial_config->option = 'linked_in_url';
        $initial_config->value = '';
        $initial_config->label = 'Perfil de LinkedIn';
        $initial_config->save();

    }

    return view('welcome');
});

Route::auth();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', [
        'as' => 'admin.index',
        'uses' => 'HomeController@index']);

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

       /* Route::resource('workshops', 'TopicsController');*/

    });

});


