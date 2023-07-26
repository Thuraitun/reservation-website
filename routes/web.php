<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Fontend\CategoryController as FontendCategoryContoller;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Fontend\MenuController as FontendMenuContoller;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Fontend\ReservationController as FontendReservationContoller;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Fontend\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/categories', [FontendCategoryContoller::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FontendCategoryContoller::class, 'show'])->name('categories.show');
Route::get('/menus', [FontendMenuContoller::class, 'index'])->name('menus.index');
Route::get('/reservation/step-one', [FontendReservationContoller::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FontendReservationContoller::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FontendReservationContoller::class, 'stepTwo'])->name('reservations.step.Two');
Route::post('/reservation/step-two', [FontendReservationContoller::class, 'storeStepTwo'])->name('reservations.store.step.two');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/menus',MenuController::class);
    Route::resource('/tables',TableController::class);
    Route::resource('/reservations',ReservationController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
