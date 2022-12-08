<?php
// User Web Route
Route::group(['module' => 'Users', 'middleware' => ['web'], 'namespace' => 'App\Modules\Users\Controllers'], function() {

    Route::resource('Users', 'UsersController');

});

// User Admin Route
Route::group(['module' => 'Users', 'prefix' => '/admin/user', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Users\Controllers'], function() {
    Route::get('/index', 'AdminUserController@index')->name('admin.user.index');
});
