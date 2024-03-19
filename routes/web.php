<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ImageController::class, 'index'])->name('list');

Route::get('/add', function () {
    return view('add-form');
})->name('add');

Route::post('/upload', [ImageController::class, 'upload'])->name('upload');
