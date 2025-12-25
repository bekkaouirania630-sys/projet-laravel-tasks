<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskcontroller;

Route::get('/', function () {
    return view('welcome');
});
route::resource('tasks', taskcontroller::class);

