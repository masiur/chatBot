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
	return Redirect::route('dashboard');
});


// Route::group(['middleware' => 'use.ssl'], function () {

// 		Route::get('webhook',['as' => 'webhook', 'uses' => 'ChatbotController@webhook']);
// 		Route::post('webhook',['as' => 'webhook.post', 'uses' => 'ChatbotController@postWebhook']);
    
// });


// Route::any('webhook',['as' => 'webhook', 'uses' => 'ChatbotController@webhook']);
Route::post('webhook',['as' => 'webhook.post', 'uses' => 'ChatbotController@postWebhook']);


Route::any('chat',['as' => 'chat.index', 'uses' => 'ChatbotController@index']);

Route::post('sendData',['as' => 'sendData', 'uses' => 'ChatbotController@receiveData']);

Route::any('privacy',['as' => 'chat.privacy', 'uses' => 'ChatbotController@privacyPolicy']);









Route::group(['middleware' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
	Route::get('user/create', ['as'=>'user.create','uses' => 'UsersController@create']);
	Route::post('user/store', ['as'=>'user.store','uses' => 'UsersController@store']);
	Route::post('login', array('uses' => 'Auth\AuthController@doLogin'));

	// social login route
	Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
	Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);

});

Route::group(array('middleware' => 'auth'), function()
{
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UsersController@profile']);
	// Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function()
{
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));

	// Demo CRUD
	Route::get('demo',['as' => 'demo.index', 'uses' => 'DemoController@index']);
	Route::get('demo/create',['as' => 'demo.create', 'uses' => 'DemoController@create']);
	Route::post('demo',['as' => 'demo.store', 'uses' => 'DemoController@store']);
	Route::get('demo/{id}/edit',['as' => 'demo.edit', 'uses' => 'DemoController@edit']);
	Route::get('demo/{id}/show',['as' => 'demo.show', 'uses' => 'DemoController@show']);
	Route::put('demo/{id}',['as' => 'demo.update', 'uses' => 'DemoController@update']);
	Route::get('demo/delete/{id}',['as' => 'demo.delete', 'uses' => 'DemoController@destroy']);
});

/* // Language CRUD
	Route::get('language',['as' => 'language.index', 'uses' => 'LanguageController@index']);
	Route::get('language/create',['as' => 'language.create', 'uses' => 'LanguageController@create']);
	Route::post('language',['as' => 'language.store', 'uses' => 'LanguageController@store']);
	Route::get('language/{id}/edit',['as' => 'language.edit', 'uses' => 'LanguageController@edit']);
	Route::get('language/{id}/show',['as' => 'language.show', 'uses' => 'LanguageController@show']);
	Route::put('language/{id}',['as' => 'language.update', 'uses' => 'LanguageController@update']);
	Route::delete('language/{id}',['as' => 'language.delete', 'uses' => 'LanguageController@destroy']);

*/
