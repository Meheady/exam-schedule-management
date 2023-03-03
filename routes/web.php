<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function (){
        Route::get('/admin/dashboard','index')->name('admin.dashboard');
    });
});


Route::middleware(['auth', 'role:student'])->group(function () {
    Route::controller(StudentController::class)->group(function (){
        Route::get('/student/dashboard','index')->name('student.dashboard');
    });
});


Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::controller(TeacherController::class)->group(function (){
        Route::get('/teacher/dashboard','index')->name('teacher.dashboard');
    });
});

require __DIR__.'/auth.php';
