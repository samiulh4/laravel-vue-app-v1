<?php
use Illuminate\Support\Facades\Route;

# without [jwt.verify]
Route::group(['module' => 'Authentication', 'prefix' => '/api','middleware' => ['api'], 'namespace' => 'App\Modules\Authentication\Controllers'], function() {
    Route::post('/sign-in', 'AuthenticationApiController@apiSignIn');
});
# with [jwt.verify]
Route::group(['module' => 'Authentication', 'prefix' => '/api','middleware' => ['api', 'jwt.verify'], 'namespace' => 'App\Modules\Authentication\Controllers'], function() {
    Route::get('/sign-out', 'AuthenticationApiController@apiSignOut');
    Route::get('/about-me', 'AuthenticationApiController@apiMe');
    Route::get('/token-refresh', 'AuthenticationApiController@apiTokenRefresh');
});
# with [auth]
Route::group(['module' => 'Authentication', 'prefix' => '/api','middleware' => ['api', 'auth'], 'namespace' => 'App\Modules\Authentication\Controllers'], function() {
    Route::get('/token-refresh', 'AuthenticationApiController@apiTokenRefresh');
});
