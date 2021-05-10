<?php

use Illuminate\Support\Facades\Route;

Route::get('/',  [ 'as' => 'home', 'uses' => 'ZodiacController@index']);
Route::get('/horoscopes',  [ 'as' => 'horoscopes', 'uses' => 'ZodiacController@getZodiacs']);
Route::get('/bestmonth',  [ 'as' => 'bestmonth', 'uses' => 'ZodiacController@monthBest']);
Route::get('/bestyear',  [ 'as' => 'bestyear', 'uses' => 'ZodiacController@yearBest']);

Route::post('/genarate', 'ZodiacController@genarateHoroscope');
Route::post('/calendar', 'ZodiacController@genarateHoroscopeCalendar');
Route::post('/bestbyyear', 'ZodiacController@genarateBestByYear');
Route::post('/bestbymonth', 'ZodiacController@genarateBestByMonth');