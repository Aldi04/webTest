<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', 'UserController@register');
Route::post('/registerAction', 'UserController@registerAction');
Route::get('/login', 'UserController@login');
Route::post('/loginAction', 'UserController@loginAction');
route::get('/home', 'UserController@home');
route::put('/changePassword', 'UserController@changePassword');
Route::get('/logout', 'UserController@logout');

route::get('/country', 'CountryController@index');
route::get('/country/{id}', 'CountryController@show');
route::post('/insertCountry', 'CountryController@insert');
route::put('/editCountry', 'CountryController@edit');
route::get('/deleteCountry/{id}', 'CountryController@delete');

route::get('/province', 'ProvinceController@index');
route::get('/province/{id}', 'ProvinceController@show');
route::post('/insertProvince', 'ProvinceController@insert');
route::put('/editProvince', 'ProvinceController@edit');
route::get('/deleteProvince/{id}', 'ProvinceController@delete');

route::get('/city', 'CityController@index');
route::get('/city/{id}', 'CityController@show');
route::post('/insertCity', 'CityController@insert');
route::put('/editCity', 'CityController@edit');
route::get('/deleteCity/{id}', 'CityController@delete');