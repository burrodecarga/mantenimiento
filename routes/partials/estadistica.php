<?php
Route::get('estadisticas/graficoLineal', 'EstadisticaController@graficoLineal')->name('estadisticas.graficoLineal')->middleware('can:estadisticas.index');
Route::get('estadisticas/graficoBarras', 'EstadisticaController@graficoBarras')->name('estadisticas.graficoBarras')->middleware('can:estadisticas.index');
Route::get('estadisticas/fallasJson', 'EstadisticaController@fallasJson')->name('estadisticas.fallasJson')->middleware('can:estadisticas.index');
Route::get('estadisticas/reportesJson', 'EstadisticaController@reportesJson')->name('estadisticas.reportesJson')->middleware('can:estadisticas.index');


Route::get('estadisticas', 'EstadisticaController@index')->name('estadisticas.index')->middleware('can:estadisticas.index');
Route::post('estadisticas', 'EstadisticaController@store')->name('estadisticas.store')->middleware('can:estadisticas.create');
Route::get('estadisticas/create', 'EstadisticaController@create')->name('estadisticas.create')->middleware('can:estadisticas.create');
Route::put('estadisticas/{estadistica}', 'EstadisticaController@update')->name('estadisticas.update')->middleware('can:estadisticas.edit');
Route::get('estadisticas/{estadistica}', 'EstadisticaController@show')->name('estadisticas.show')->middleware('can:estadisticas.show');
Route::delete('estadisticas/{estadistica}', 'EstadisticaController@destroy')->name('estadisticas.destroy')->middleware('can:estadisticas.destroy');
Route::get('estadisticas/{estadistica}/edit', 'EstadisticaController@edit')->name('estadisticas.edit')->middleware('can:estadisticas.edit');


