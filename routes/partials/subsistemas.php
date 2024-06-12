<?php
Route::get('subsistemas/formImportExcel','SubsistemaController@formImportExcel')->name('subsistemas.formImportExcel');
Route::post('subsistemas/importExcel','SubsistemaController@importExcel')->name('subsistemas.importExcel');
Route::post('subsistemas/borrar', 'SubsistemaController@vaciar')->name('subsistemas.vaciar');



Route::post('subsistemas/store', 'SubsistemaController@store')->name('subsistemas.store')->middleware('can:subsistemas.create');
Route::get('subsistemas', 'SubsistemaController@index')->name('subsistemas.index')->middleware('can:subsistemas.index');
Route::get('subsistemas/create', 'SubsistemaController@create')->name('subsistemas.create')->middleware('can:subsistemas.create');
Route::put('subsistemas/{subsistema}', 'SubsistemaController@update')->name('subsistemas.update')->middleware('can:subsistemas.edit');
Route::get('subsistemas/{subsistema}', 'SubsistemaController@show')->name('subsistemas.show')->middleware('can:subsistemas.show');
Route::delete('subsistemas/{subsistema}', 'SubsistemaController@destroy')->name('subsistemas.destroy')->middleware('can:subsistemas.destroy');
Route::get('subsistemas/{subsistema}/edit', 'SubsistemaController@edit')->name('subsistemas.edit')->middleware('can:subsistemas.edit');

Route::get('subsistemas/getsubsistemas/{subsistema}', 'SubsistemaController@getsubsistemas');


