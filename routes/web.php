<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

Route::get('/', function () {
    return view('welcome');
});

// generate short link
Route::get('short-link', [ShortLinkController::class, 'index']);
Route::post('short-link', [ShortLinkController::class,'store'])->name('short.link');

Route::get('{code}', [ShortLinkController::class, 'shortLink'])->name('short.link.code');
