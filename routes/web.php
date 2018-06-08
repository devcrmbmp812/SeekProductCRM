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

Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/main', 'HomeController@home');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
	
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('mail_verify', 'Auth\RegisterController@mail_verify_window')->name('mail_verify_window');
Route::post('mail_verify', 'Auth\RegisterController@mail_verify')->name('mail_verify');
Route::get('phone_verify', 'Auth\RegisterController@phone_verify_window')->name('phone_verify_window');
Route::post('phone_verify', 'Auth\RegisterController@phone_verify')->name('phone_verify');
Route::get('phone_verify_confirm', 'Auth\RegisterController@phone_verify_confirm_window')->name('phone_verify_confirm_window');
Route::post('phone_verify_confirm', 'Auth\RegisterController@phone_verify_confirm')->name('phone_verify_confirm');

Route::post('add_intro_info', 'ProfileController@add_intro_info')->name('add_intro_info');
Route::post('add_company_info', 'ProfileController@add_company_info')->name('add_company_info');
Route::post('add_role_info', 'ProfileController@add_role_info')->name('add_role_info');
Route::post('add_date_info', 'ProfileController@add_date_info')->name('add_date_info');
Route::post('add_contact_info', 'ProfileController@add_contact_info')->name('add_contact_info');
Route::post('add_overall_info', 'ProfileController@add_overall_info')->name('add_overall_info');