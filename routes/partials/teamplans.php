<?php

Route::get('teamplans/', 'TeamplansController@index')->name('teamplans.index')->middleware('can:teamplans.index');
Route::get('teamplans/{task}/taskteam', 'TeamplansController@taskteam')->name('teamplans.taskteam')->middleware('can:teamplans.taskteam');
Route::put('teamplans/{task}/store', 'TeamplansController@store')->name('teamplans.store')->middleware('can:teamplans.store');

