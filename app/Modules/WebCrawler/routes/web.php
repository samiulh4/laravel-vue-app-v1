<?php
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'WebCrawler', 'middleware' => ['web'], 'namespace' => 'App\Modules\WebCrawler\Controllers'], function() {
    Route::get('/crawler/web/scraping', 'WebCrawlerController@webScraping');
});
