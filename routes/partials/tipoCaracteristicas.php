<?php

Route::get('tipocaracteristicas/{tipo}', 'TipoCaracteristicasController@index')->name('tipocaracteristicas.index')->middleware('can:tipos.index');
Route::get('tipocaracteristicas/{tipo}/{caracteristica}/edit', 'TipoCaracteristicasController@edit')->name('tipocaracteristicas.edit')->middleware('can:tipos.index');
Route::put('tipocaracteristicas/{tipo}/{caracteristica}/update', 'TipoCaracteristicasController@update')->name('tipocaracteristicas.update')->middleware('can:tipos.index');
Route::get('tipocaracteristicas/{tipo}/show', 'TipoCaracteristicasController@show')->name('tipocaracteristicas.show')->middleware('can:tipos.show');
Route::get('tipocaracteristicas/{tipo}/clone', 'TipoCaracteristicasController@clone')->name('tipocaracteristicas.clone')->middleware('can:tipos.show');
Route::get('tipocaracteristicas/{tipo}/imagen', 'TipoCaracteristicasController@imagen')->name('tipocaracteristicas.imagen')->middleware('can:tipos.create');
Route::post('tipocaracteristicas/{tipo}/store', 'TipoCaracteristicasController@store')->name('tipocaracteristicas.store')->middleware('can:tipos.create');
