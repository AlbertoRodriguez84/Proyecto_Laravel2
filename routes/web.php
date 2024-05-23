<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('main');

/*Route::get('/', function () {
    return view('welcome');
});*/
