<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index')->name('index');

Route::get('/stat', 'StatController@index')->name('stat.index');

Route::get('/links', 'LinkController@create')->name('links.create');
Route::post('/links', 'LinkController@store')->name('links.store');
Route::get('/links/{link:slug}', 'LinkController@show')->name('links.show');

Route::get('/{slug_visit}', 'VisitController@store')->name('visit.index');
