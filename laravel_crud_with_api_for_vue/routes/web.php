<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create-data', function () {
    return view('crud.create-data');
})
->name('create');
Route::get('/list', function () {
    return view('crud.list-data');
})
->name('list');

Route::get('/edit/{id}', function ($id) {
    return view('crud.edit-data', compact('id'));
})
->name('edit');
