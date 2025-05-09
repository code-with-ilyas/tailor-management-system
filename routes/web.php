<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PentController;
use App\Http\Controllers\ShirtController;
use App\Http\Controllers\WaistCoatController;
use App\Http\Controllers\ShalwarKameezController;
use App\Http\Controllers\InvoiceController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');





Route::resource('users', UserController::class);

Route::resource('pents', PentController::class);

Route::resource('shirts', ShirtController::class);

Route::resource('waistcoats', WaistCoatController::class);

Route::resource('shalwar-kameez', ShalwarKameezController::class);

Route::resource('invoice', InvoiceController::class);

Route::get('invoice/{id}/print', [InvoiceController::class, 'printInvoice'])->name('invoice.print');





require __DIR__ . '/auth.php';
