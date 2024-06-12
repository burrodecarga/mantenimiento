<?php
Route::post('zonas/store','ZonaController@store')->name('zonas.store')->middleware('can:zonas.create');
Route::get('zonas','ZonaController@index')->name('zonas.index')->middleware('can:zonas.index');
Route::get('zonas/create','ZonaController@create')->name('zonas.create')->middleware('can:zonas.create');
Route::put('zonas/{zona}','ZonaController@update' )->name('zonas.update')->middleware('can:zonas.edit');
Route::get('zonas/{zona}','ZonaController@show' )->name('zonas.show')->middleware('can:zonas.show');
Route::get('zonas/{zona}/edit','ZonaController@edit' )->name('zonas.edit')->middleware('can:zonas.edit');
Route::delete('zonas/{zona}/destroy' ,'ZonaController@destroy')->name('zonas.destroy')->middleware('can:zonas.destroy');
?>
