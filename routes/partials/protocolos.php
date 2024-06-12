<?php
Route::get('protocolos/formImportExcel','ProtocoloController@formImportExcel')->name('protocolos.formImportExcel');
Route::post('protocolos/importExcel','ProtocoloController@importExcel')->name('protocolos.importExcel');
Route::post('protocolos/borrar', 'ProtocoloController@vaciar')->name('protocolos.vaciar');



Route::post('protocolos/store', 'ProtocoloController@store')->name('protocolos.store')->middleware('can:protocolos.create');
Route::get('protocolos', 'ProtocoloController@index')->name('protocolos.index')->middleware('can:protocolos.index');
Route::get('protocolos/create', 'ProtocoloController@create')->name('protocolos.create')->middleware('can:protocolos.create');
Route::put('protocolos/{protocolo}', 'ProtocoloController@update')->name('protocolos.update')->middleware('can:protocolos.edit');
Route::get('protocolos/{protocolo}', 'ProtocoloController@show')->name('protocolos.show')->middleware('can:protocolos.show');
Route::delete('protocolos/{protocolo}', 'ProtocoloController@destroy')->name('protocolos.destroy')->middleware('can:protocolos.destroy');
Route::get('protocolos/{protocolo}/edit', 'ProtocoloController@edit')->name('protocolos.edit')->middleware('can:protocolos.edit');


