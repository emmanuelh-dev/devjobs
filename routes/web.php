<?php

use App\Http\Controllers\vacanteController;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');
Route::get('vacantes', [vacanteController::class, 'index'])->middleware(['auth'])->name('vacantes.index');

Route::get('vacantes/nueva', [vacanteController::class, 'create'])->middleware(['auth'])->name('vacantes.create');
Route::get('vacantes/{vacante}/edit', [vacanteController::class, 'edit'])->middleware(['auth'])->name('vacantes.edit');

require __DIR__ . '/auth.php';
