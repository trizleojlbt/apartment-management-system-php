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

Route::get('/home', function(){
	return view('pages.home');
});

Route::get('/register', function(){
	return view('pages.register');
});

Route::get('/contact', function(){
	return view('pages.contact');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Manage Apartment
Route::get('/admin/manageapartment', 'ApartmentController@show');
Route::post('/admin/addapartment', 'ApartmentController@store');
Route::post('/admin/updateapartment/{id}', 'ApartmentController@update');
Route::get('/admin/deleteapartment/{id}', ['uses'=>'ApartmentController@destroy']);

// Manage Block
Route::get('/admin/manageblock', 'BlockController@show');
Route::post('/admin/addblock', 'BlockController@store');
Route::post('/admin/updateblock/{id}', 'BlockController@update');
Route::get('/admin/deleteblock/{id}', ['uses'=>'BlockController@destroy']);


// Manage Individual Apartment
Route::get('/admin/manageindi', 'IndividualApartmentController@show');
Route::post('/admin/addindi', 'IndividualApartmentController@store');
Route::post('/admin/updateindi/{id}', 'IndividualApartmentController@update');
Route::get('/admin/deleteindi/{id}', ['uses'=>'IndividualApartmentController@destroy']);

//Manage Owner
Route::get('/admin/manageowner', 'OwnerController@show');
Route::post('/admin/addowner', 'OwnerController@store');
Route::post('/admin/updateowner/{id}', 'OwnerController@update');
Route::get('/admin/deleteowner/{id}', ['uses'=>'OwnerController@destroy']);

Route::get('/seed', function(){
	DB::table('admin')->delete();

        $admin = [
            [
               'admin_id'			=>'12345',
               'admin_lastname'		=>'Uy',
               'admin_firstname'	=>'Dennis',
               'admin_middlename'	=>'Miguel',
               'admin_birthdate'	=>'1996-01-04',
               'admin_homeaddress'	=>'721 QMWMAA DAS Toledo City Cebu ',
               'admin_gender'		=>'Male',
               'admin_telephone'	=>'09231473244',
               'admin_username'		=>'admin',
               'admin_password'		=>'root',
               'admin_email'		=>'denzkiuy@gmail.com'
            ]
        ];

        DB::table('admin')->insert($admin);
});