<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/', [TodoController::class, 'index'])->name('home');


Route::get('/add-todo', [TodoController::class, 'add_todo'])->name('add.todo');
Route::post('/store-todo', [TodoController::class, 'store_todo'])->name('todo.store');
Route::get('/edit-todo/{id}', [TodoController::class, 'edit_todo'])->name('todo.edit');
Route::post('/update-todo/{id}', [TodoController::class, 'update_todo'])->name('todo.update');
Route::get('/delete-todo/{id}', [TodoController::class, 'delete_todo'])->name('todo.delete');
Route::get('/toggle-todo/{id}', [TodoController::class, 'toggle_todo'])->name('todo.toggle');
