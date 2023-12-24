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

Route::get("/application", function () {
    return view("welcome");
});

Route::group(['prefix' => 'application', 'as' => 'application.'], function () {
    Route::get('/',                       [App\Http\Controllers\InformationController::class, 'index'])->name('index');
    Route::get('/create',                 [App\Http\Controllers\InformationController::class, 'create'])->name('create');
    Route::post('/',                      [App\Http\Controllers\InformationController::class, 'store'])->name('store');
    Route::get('/edit/{id}',              [App\Http\Controllers\InformationController::class, 'edit'])->name('edit');
    Route::get('/update/{id}',            [App\Http\Controllers\InformationController::class, 'update'])->name('update');
    Route::get('/view',                   [App\Http\Controllers\InformationController::class, 'view'])->name('view');
    Route::get('/delete/{id}',            [App\Http\Controllers\InformationController::class, 'delete'])->name('delete');
});
