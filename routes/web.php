<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\ProfileController;
use App\Models\Event;
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

Route::get('/',[EventController :: class, 'index']) -> name('event.welcome');
Route::get('/create',[EventController :: class, 'create']) -> name('event.create');
Route::post('/store',[EventController :: class, 'store']) -> name('event.store');
Route::get('/show/{id}',[EventController :: class, 'show']) -> name('event.show');
Route::delete('/delete/{id}',[EventController :: class, 'destroy']) -> name('event.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
