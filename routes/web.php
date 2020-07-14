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

Route::get('/', 'AuthController@getLogin');

Route::get("/register", "AuthController@getRegister");
Route::post("/register", "AuthController@postRegister");

Route::post('/login',  'AuthController@postLogin');

Route::get("/home", "HomeController@getHome");

Route::get("/logout", "HomeController@getLogout");

Route::get("/change-password", "HomeController@getChangePassword");
Route::post("/change-password", "HomeController@postChangePassword");

Route::get("/admin/add-festival", "AdminController@getAddFestival");
Route::post("/admin/add-festival", "AdminController@postAddFestival");

Route::get("/admin/users", "AdminController@getUsers");
Route::get("/admin/users/delete/{id}", "AdminController@getDeleteUser");


Route::get("/home/{festival_id}", "HomeController@getDeleteFestival");

Route::get("/admin/edit_festival/{festival_id}", "AdminController@getEditFestival");
Route::post("/admin/edit_festival/{festival_id}", "AdminController@postEditFestival");

Route::get("/buy-tickets/{festival_id}", "HomeController@getBuyTickets");
Route::post("/buy-tickets/{festival_id}", "HomeController@postBuyTickets");

Route::get("/ticket/{festival_id}", "HomeController@getTicket");













