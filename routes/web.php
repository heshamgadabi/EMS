<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;

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


Route::middleware(['auth','Admin'])->group(function () {
    Route::get('event/list', [EventController::class, 'index'])->name('event.list');
    Route::get('event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('event/update/{id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('event/delete/{id}', [EventController::class, 'destroy'])->name('event.destroy');

    Route::get('users/list', [UserController::class, 'index'])->name('users.list');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');

    Route::get('event/admin/{id}', [EventController::class, 'admin'])->name('event.admin');
    Route::get('event/admin/overview/{id}', [EventController::class, 'overviewEvent'])->name('event.admin.overview');

    Route::get('event/ticket/create/{id}', [EventController::class, 'createTicket'])->name('event.ticket.create');
    Route::post('event/ticket/store/{id}', [EventController::class, 'storeTicket'])->name('event.ticket.store');

    Route::get('event/ticket/edit/{ticket_id}', [EventController::class, 'editTicket'])->name('event.ticket.edit');
    Route::put('event/ticket/update/{ticket_id}', [EventController::class, 'updateTicket'])->name('event.ticket.update');
    Route::delete('event/ticket/delete/{ticket_id}', [EventController::class, 'deleteTicket'])->name('event.ticket.delete'); 
    
    Route::get('event/pictures/{id}', [EventController::class, 'eventPictures'])->name('event.pictures');

    Route::post('event/pictures/{id}', [EventController::class, 'storePictures'])->name('event.pictures.store');

    Route::delete('event/pictures/{id}/{photo_id}', [EventController::class, 'destroyPictures'])->name('event.pictures.destroy');


});








Route::get('user/login', [UserController::class, 'login'])->name('user.login');
Route::post('user/login', [UserController::class, 'authenticate'])->name('user.authenticate');


Route::get('home', [FrontController::class, 'home'])->name('home');

Route::get('event/{id}', [FrontController::class, 'eventDetails'])->name('event.details');

Route::get('event/ticket/{id}', [FrontController::class, 'eventTicket'])->middleware('auth')->name('event.ticket');

Route::post('event/ticket/{id}/checkout', [FrontController::class, 'ticketCheckout'])->middleware('auth')->name('front.tickets.checkout');

Route::get('event/ticket/{id}/checkout', [FrontController::class, 'ticketCheckoutSummary'])->middleware('auth')->name('front.tickets.checkout.summary');


require __DIR__.'/auth.php';
