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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});

Route::middleware(['auth'])->group(function (){
   Route::get('/companies', 'CompanyController@index');
   Route::get('/create', function() {
       return view('create_company');
   });
   Route::post('/store', 'CompanyController@store');
   Route::get('/company/{id}/edit', 'CompanyController@edit');
   Route::post('/company/{id}/edit', 'CompanyController@update');
   Route::get('/company/{id}/delete', 'CompanyController@destroy');

   Route::prefix('company/{id}')->group(function() {
       Route::get('/employers', 'EmployerController@index');
       Route::get('/employers/{id_employer}/delete', 'EmployerController@destroy');
       Route::get('/employers/{id_employer}/edit', 'EmployerController@edit');
       Route::get('/employers/create', 'EmployerController@create');
       Route::post('/employers/create', 'EmployerController@store');
    });
});
