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

// Site routes
Route::get('/','SiteController@index');
Route::get('/contact','SiteController@contact');
Route::post('/contact','SiteController@post_contact');
Route::get('/produits','SiteController@produits');
Route::get('/portfolio','SiteController@portfolio');
Route::get('/product/choose/{id}','SiteController@chooseProduct');
Route::get('/product/pay/{id}','SiteController@payProduct')->middleware('auth');
Route::post('/product/pay/{id}','SiteController@postpayProduct')->middleware('auth');
Route::get('/reclamations', 'SiteController@reclamations')->middleware('auth');
Route::get('/reclamation/add', 'SiteController@getAddReclamation')->middleware('auth');
Route::post('/reclamation/add', 'SiteController@postAddReclamation')->middleware('auth');
Route::get('/evenements', 'SiteController@evenements')->middleware('auth');

Route::auth();

// Admin routes
Route::get('/admin', 'AdminController@index')->middleware('auth');
Route::get('/admin/reclamations', 'AdminController@reclamations')->middleware('auth');
Route::get('/admin/users', 'AdminController@users')->middleware('auth');
Route::get('/admin/products', 'AdminController@products')->middleware('auth');
Route::get('/admin/product/add', 'AdminController@getAddProduct')->middleware('auth');
Route::post('/admin/product/add', 'AdminController@postAddProduct')->middleware('auth');
Route::get('/admin/product/edit/{id}', 'AdminController@getEditProduct')->middleware('auth');
Route::post('/admin/product/edit/{id}', 'AdminController@postEditProduct')->middleware('auth');
Route::get('/admin/product/delete/{id}', 'AdminController@deleteProduct')->middleware('auth');
Route::get('/admin/messages', 'AdminController@messages')->middleware('auth');
Route::get('/admin/message/delete/{id}', 'AdminController@deleteMessage')->middleware('auth');
Route::get('/admin/reclamations', 'AdminController@reclamations')->middleware('auth');
Route::get('/admin/reclamation/delete/{id}', 'AdminController@deleteReclamation')->middleware('auth');
Route::get('/admin/evenements', 'AdminController@evenements')->middleware('auth');
Route::get('/admin/evenement/add', 'AdminController@getAddEvenement')->middleware('auth');
Route::post('/admin/evenement/add', 'AdminController@postAddEvenement')->middleware('auth');
Route::get('/admin/evenement/delete/{id}', 'AdminController@deleteEvenement')->middleware('auth');
