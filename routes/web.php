<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

/****************   Model binding into route **************************/

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');

Route::model('client', 'App\Models\Client');


Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', 'HomeController@index');

Route::resource('clients', 'User\ClientController');



//----------------- Local API routes
Route::group(['prefix' => '/api/'], function()
{
    // USER
//    Route::get('user', 'UsersController@getUser');
//    Route::post('user/{id}', 'UsersController@updateUser');
//    Route::delete('user/', 'UsersController@deleteUser');
//    // CLIENT
    Route::get('clients', 'User\ClientController@getAllUserClients');
//    Route::put('clients/{id}', 'ClientsController@updateClient');
//    Route::post('clients', 'ClientsController@storeClient');
//    Route::delete('clients/{id}', 'ClientsController@removeClient');

});
