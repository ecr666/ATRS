<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/* original
Route::get('/', function()
{
	return View::make('hello');
});
*/
Route::get('/', array(

	'as' => 'home',
	'uses' => 'HomeController@home'
));

//Route::get('/airports', array('uses' => 'airports@get_index' ));

Route::resource('/airports', 'AirportController');

Route::group( array('before'=> 'guest'),function(){

	Route::group(array('before'=> 'csrf'), function(){


	
Route::post('/flight/reserve', array(
	'as' => 'flight-reserve-post',
	'uses' =>'ReserveController@postCreate'
	));

Route::post('/details/personal', array(
	'as' => 'details-personal-post',
	'uses' =>'PersonalDetailController@postCreate'
	));
Route::post('/flight/reserve/completed', array(
	'as' => 'flights-reserve-completed-post',
	'uses' =>'PersonalDetailController@postComplete'
	));
});
//create account GET
Route::get('/reserve', array(
	'as' => 'flight-reserve',
	'uses' =>'ReserveController@getCreate'
	));
Route::get('/reserve/personal', array(
	'as' => 'details-personal',
	'uses' =>'PersonalDetailController@getCreate'
	));
Route::get('/flight/reserve/completed', array(
	'as' => 'flights-reserve-completed',
	'uses' =>'PersonalDetailController@getComplete'
	));
}	);


