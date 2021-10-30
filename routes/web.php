<?php

Route::get('/', function () {
    return view('welcome');
});

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'role:superadmin'])
    ->group(function () {
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
        Route::resource('role', 'RoleController');
    });

Route::resource('article', 'ArticleController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
