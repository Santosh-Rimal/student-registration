<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\student\StudentStudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified',\App\Http\Middleware\UserMiddleware::class])->name('dashboard');



Route::resource('students',StudentController::class)->middleware([\App\Http\Middleware\UserMiddleware::class]);
Route::resource('mydetails',StudentStudentController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/approve/{id}', [StatusController::class, 'approve'])->middleware([\App\Http\Middleware\UserMiddleware::class])->name('approve');
Route::post('/reject/{id}', [StatusController::class, 'reject'])->middleware([\App\Http\Middleware\UserMiddleware::class])->name('reject');
require __DIR__.'/auth.php';


// Route::get('/our-blogs', [BlogController::class,'index'])->name('frontend.blogs');