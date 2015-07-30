<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
 Admin Route Group, All Routes in here will require Admin roles.
*/
Route::group([
    'as' => 'dashboard',
    'middleware' => 'role:admin',
    'uses' => 'Askedio\Laravelcp\Http\Controllers\HomeController',
  ],
  function () {

    Route::resource('dashboard', 'Askedio\Laravelcp\Http\Controllers\HomeController');

  }
);



Route::get('auth/login', 'Askedio\Laravelcp\Http\Controllers\Auth\AuthController@getLogin');
Route::post('auth/login', 'Askedio\Laravelcp\Http\Controllers\Auth\AuthController@postLogin');
Route::get('auth/logout', 'Askedio\Laravelcp\Http\Controllers\Auth\AuthController@getLogout');


Route::get('auth/register', 'Askedio\Laravelcp\Http\Controllers\Auth\AuthController@getRegister');
Route::post('auth/register', 'Askedio\Laravelcp\Http\Controllers\Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Askedio\Laravelcp\Http\Controllers\Auth\PasswordController',
]);
