<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Admin\ClientController@index');
Route::get('/admin', 'Admin\ClientController@index');

Auth::routes();

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'], function () {
    Route::resource('clients', 'Admin\ClientController', ['except' => 'show']);
    Route::resource('imports', 'Admin\ImportController', ['except' => 'show']);
    Route::get('clients/{id}/delete', 'Admin\ClientController@destroy')->name('clients.destroy');

    Route::get('clients/import', 'Admin\ClientController@import')->name('clients.imports');
    Route::post('clients/import-file', 'Admin\ClientController@importFile')->name('clients.imports.file');

    Route::resource('emails', 'Admin\EmailSentController', ['except' => ['show']]);
    Route::get('emails/send/{id}', 'Admin\EmailSentController@resendMail')->name('emails.send');

    Route::resource('employees', 'Admin\EmployeesController', ['except' => ['show','edit']]);
    Route::get('employees/edit', 'Admin\EmployeesController@edit')->name('employees.edit');
    Route::get('employees/{id}/delete', 'Admin\EmployeesController@destroy')->name('employees.destroy');

});




