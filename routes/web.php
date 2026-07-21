<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('event/list', [EventController::class, 'index'])->middleware('auth')->name('event.list');
Route::get('event/create', [EventController::class, 'create'])->middleware('auth')->name('event.create');

Route::post('event/store', [EventController::class, 'store'])->middleware('auth')->name('event.store');

Route::get('event/edit/{id}', [EventController::class, 'edit'])->middleware('auth')->name('event.edit');
Route::put('event/update/{id}', [EventController::class, 'update'])->middleware('auth')->name('event.update');
Route::delete('event/delete/{id}', [EventController::class, 'destroy'])->middleware('auth')->name('event.destroy');

Route::get('event/admin/{id}', [EventController::class, 'admin'])->middleware('auth')->name('event.admin');

Route::get('event/ticket/create/{id}', [EventController::class, 'createTicket'])->middleware('auth')->name('event.ticket.create');
Route::post('event/ticket/store/{id}', [EventController::class, 'storeTicket'])->middleware('auth')->name('event.ticket.store');

Route::get('event/ticket/edit/{ticket_id}', [EventController::class, 'editTicket'])->middleware('auth')->name('event.ticket.edit');
Route::put('event/ticket/update/{ticket_id}', [EventController::class, 'updateTicket'])->middleware('auth')->name('event.ticket.update');
Route::delete('event/ticket/delete/{ticket_id}', [EventController::class, 'deleteTicket'])->middleware('auth')->name('event.ticket.delete'); 


require __DIR__.'/auth.php';
