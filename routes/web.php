<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard/my-products',[ProductController::class, 'myProducts'])->name('products.my');

    Route::resource('products', ProductController::class);

    Route::get('/chat',[ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{conversation}',[ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/{conversation}/send',[ChatController::class, 'send'])->name('chat.send');
    Route::post('/chat/start/{product}',[ChatController::class, 'start'])->name('chat.start');
});

require __DIR__.'/auth.php';