<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::auth();

Route::group(['middleware' => 'auth'],function(){

	Route::get('/','MainController@index');

	Route::get('master/rute','MasterController@rute');
	Route::post('rute/save','MasterController@save_the_rute');
	Route::post('rute/update','MasterController@update_the_rute');
	Route::get('rute/delete/{id}','MasterController@delete_the_rute');

	Route::get('master/transportation_type','MasterController@transport_type');
	Route::post('transport_type/save','MasterController@save_the_transport_type');
	Route::post('transport_type/update','MasterController@update_the_transport_type');
	Route::get('transport_type/delete/{id}','MasterController@delete_the_transport_type');

	Route::get('master/transportation','MasterController@transportation');
	Route::get('getRandomCode/{id}','MasterController@generateRandomCode');
	Route::post('transportation/save','MasterController@save_the_transportation');
	Route::post('transportation/update','MasterController@update_the_transportation');
	Route::get('transportation/delete/{id}','MasterController@delete_the_transportation');



	Route::get('getRute/{event1}/{event2}',[
		'as' => 'report','uses' => 'TransactionController@getRuteFromTo'
	]);

	Route::get('transaction/reserve/step_2/{event1}/{event2}','TransactionController@reserve_step2');
	Route::get('transaction/reserve/step_3/{event1}/{event2}','TransactionController@reserve_step3');


	Route::get('transaction/reservation','TransactionController@reservation');
	Route::get('getSeat/{event1}/{event2}',[
		'as' => 'report','uses' => 'TransactionController@getSeatByIDTransport'
	]);

	Route::post('transaction/save','TransactionController@save_em_up');

	Route::get('checkout_transaction/{id}','TransactionController@printCheckout');

	Route::get('getName/{id}','TransactionController@getNameCustomer');
	Route::get('getAddress/{id}','TransactionController@getAddressCustomer');
	Route::get('getPhone/{id}','TransactionController@getPhoneCustomer');
	Route::get('getGender/{id}','TransactionController@getGenderCustomer');

	Route::get('getDataReserve/{id}','TransactionController@get_data_reserve');

	Route::get('booking/cancel/{id}','TransactionController@cancel_booking');

	Route::get('report/report_customer','ReportController@customer');
	Route::get('report/report_transportation','ReportController@transportation');
	Route::get('report/report_rute','ReportController@rute');
	Route::get('report/report_reservation','ReportController@reservation');

	Route::post('saveUser','MasterController@user_save');
	Route::post('updateUser','MasterController@user_update');
	Route::get('deleteUser/{id}','MasterController@user_delete');

});


