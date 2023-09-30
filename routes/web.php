<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
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


Route::get('/itens', [ItemController::class, 'index'])->name('produto.index');
Route::get('/itens/create', [ItemController::class, 'create'])->name('produto.create');
Route::post('/itens', [ItemController::class, 'store'])->name('produto.store');
Route::get('/itens/{item}/edit', [ItemController::class, 'edit'])->name('produto.edit');
Route::put('/itens/{item}', [ItemController::class, 'update'])->name('produto.update');
Route::delete('/itens/{item}', [ItemController::class, 'destroy'])->name('produto.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/produtos', function () {
    return view('produtos');
})->middleware(['auth', 'verified'])->name('produtos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
