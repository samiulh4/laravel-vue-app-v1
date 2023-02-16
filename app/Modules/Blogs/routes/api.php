<?php
# without [jwt.verify]
Route::group(['module' => 'Blogs', 'middleware' => ['api'], 'prefix' => '/api', 'namespace' => 'App\Modules\Blogs\Controllers'], function() {
    Route::get('/blog/index/{page}', 'BlogApiController@index');
    Route::get('/blog/details/{id}', 'BlogApiController@details');
    Route::get('/blog/tag/get-tags', 'BlogApiController@getTags');
});
# with [jwt.verify]
Route::group(['module' => 'Blogs', 'middleware' => ['api', 'jwt.verify'], 'prefix' => '/api', 'namespace' => 'App\Modules\Blogs\Controllers'], function() {
    Route::post('/blog/store', 'BlogApiController@store');
    Route::get('/blog/edit/{id}', 'BlogApiController@edit');
});
