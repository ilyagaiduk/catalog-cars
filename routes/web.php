<?php

use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware' => 'auth','prefix' => 'admin',
], function () {
    Route::match(array('GET','POST'), '/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    Route::match(array('GET','POST'), '/brand', 'App\Http\Controllers\IndexController@brandAll')->name('brand');
    Route::match(array('GET','POST'), '/models', 'App\Http\Controllers\IndexController@modelsAll')->name('models');
    Route::match(array('GET','POST'), '/cars', 'App\Http\Controllers\IndexController@carsAll')->name('cars');
    //delete
    Route::match(array('GET','POST'), '/delete', 'App\Http\Controllers\DeleteController@deleteData')->name('delete');
    //edit
    Route::match(array('GET','POST'), '/edit/brand', 'App\Http\Controllers\EditController@editDataBrand')->name('editBrand');
    Route::match(array('GET','POST'), '/edit/model', 'App\Http\Controllers\EditController@editDataModel')->name('editModel');
    Route::match(array('GET','POST'), '/edit/car', 'App\Http\Controllers\EditController@editDataCar')->name('editCar');
});
require __DIR__.'/auth.php';
