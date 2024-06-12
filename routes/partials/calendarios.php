    <?php
    Route::get('calendarios/', 'CalendarioController@index')->name('calendarios.index')->middleware('can:calendarios.index');
    Route::get('calendarios/data', 'CalendarioController@indexData')->name('calendarios.indexData')->middleware('can:calendarios.indexData');
    Route::get('calendarios/show/{id}', 'CalendarioController@show')->name('calendarios.show')->middleware('can:calendarios.show');
    Route::get('calendarios/showCostos/{id}', 'CalendarioController@showCostos')->name('calendarios.showCostos')->middleware('can:calendarios.show');

