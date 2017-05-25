<?php

Route::get('/', function () {
    return view('test');
});

Route::resource('invoices', 'InvoiceController');

Route::post('store','InvoiceController@store');

Route::post('update','InvoiceController@update');
