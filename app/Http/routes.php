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


Route::get('home', function () {
    return view('welcome');
});



// Authentication routes...
/*
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
*/
// Registration routes...
/*
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/*
Route::get('questions', 'QuestionsController@index');
Route::get('questions/create', 'QuestionsController@create');
Route::get('questions/{id}', 'QuestionsController@show');
Route::post('questions', 'QuestionsController@store');
*/

Route::resource('questions', 'QuestionsController'); 


