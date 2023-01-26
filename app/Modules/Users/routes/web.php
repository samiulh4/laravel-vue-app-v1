<?php
use Illuminate\Support\Facades\Route;


// User Web Route
Route::group(['module' => 'Users', 'middleware' => ['web'], 'namespace' => 'App\Modules\Users\Controllers'], function() {

   // Route::resource('Users', 'UsersController');

});

// User Admin Route
Route::group(['module' => 'Users', 'prefix' => '/admin/user', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Users\Controllers'], function() {
    Route::get('/index', 'AdminUserController@index')->name('admin.user.index');
    Route::get('/create', 'AdminUserController@create')->name('admin.user.create');
    Route::get('/edit/{id}', 'AdminUserController@edit')->name('admin.user.edit');
    Route::post('/store', 'AdminUserController@store')->name('admin.user.store');
    Route::post('/update', 'AdminUserController@update')->name('admin.user.update');
});

// User Admin V2 Route
Route::group(['module' => 'Users', 'prefix' => '/admin/v2/user', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Users\Controllers'], function() {
    Route::get('/index', 'NiceAdminUserController@index')->name('admin.v2.user.index');
    Route::get('/create', 'NiceAdminUserController@create')->name('admin.v2.user.create');
});
