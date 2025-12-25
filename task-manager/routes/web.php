<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskcontroller;

Route::get('/', function () {
    return view('welcome');
});
route::resource('tasks', taskcontroller::class);
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])
    ->name('tasks.toggle');

