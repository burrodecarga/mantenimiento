<?php

Route::get('tipoprotocolos/{tipo}', 'TipoProtocoloController@index')->name('tipoprotocolos.index')->middleware('can:tipos.index');
Route::get('tipoprotocolos/{tipo}/{caracteristica}/edit', 'TipoProtocoloController@edit')->name('tipoprotocolos.edit')->middleware('can:tipos.index');
Route::put('tipoprotocolos/{tipo}/{caracteristica}/update', 'TipoProtocoloController@update')->name('tipoprotocolos.update')->middleware('can:tipos.index');
Route::get('tipoprotocolos/{tipo}/show', 'TipoProtocoloController@show')->name('tipoprotocolos.show')->middleware('can:tipos.show');
Route::get('tipoprotocolos/{tipo}/clone', 'TipoProtocoloController@clone')->name('tipoprotocolos.clone')->middleware('can:tipos.show');
Route::get('tipoprotocolos/{tipo}/imagen', 'TipoProtocoloController@imagen')->name('tipoprotocolos.imagen')->middleware('can:tipos.create');
Route::post('tipoprotocolos/{tipo}/store', 'TipoProtocoloController@store')->name('tipoprotocolos.store')->middleware('can:tipos.create');
