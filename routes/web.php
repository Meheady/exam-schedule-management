<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\admin\BatchController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\AdmitController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\SemesterController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\RegistrationController;
use App\Http\Controllers\admin\AdmitVerifyController;
use App\Http\Controllers\admin\ExamScheduleController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function (){
        Route::get('/admin/dashboard','index')->name('admin.dashboard');
    });
    Route::controller(BatchController::class)->group(function (){
        Route::get('/admin/batch','CreateBatch')->name('manage.batch');
        Route::post('/batch/store','storeBatch')->name('store.batch');
        Route::post('/batch/update','updateBatch')->name('update.batch');
        Route::get('/batch/edit','editBatch')->name('edit.batch');
        Route::get('/batch/delete/{id}','deleteBatch')->name('delete.batch');
    });
    Route::controller(SectionController::class)->group(function (){
        Route::get('/create/section','CreateSection')->name('manage.section');
        Route::post('/section/store','storeSection')->name('store.section');
        Route::post('/section/update','updateSection')->name('update.section');
        Route::get('/section/edit','editSection')->name('edit.section');
        Route::get('/section/delete/{id}','deleteSection')->name('delete.section');
    });
    Route::controller(SemesterController::class)->group(function (){
        Route::get('/create/semester','CreateSemester')->name('manage.semester');
        Route::post('/semester/store','storeSemester')->name('store.semester');
        Route::post('/semester/update','updateSemester')->name('update.semester');
        Route::get('/semester/edit','editSemester')->name('edit.semester');
        Route::get('/semester/delete/{id}','deleteSemester')->name('delete.semester');
    });
    Route::controller(CourseController::class)->group(function (){
        Route::get('/create/course','CreateCourse')->name('manage.course');
        Route::post('/course/store','storeCourse')->name('store.course');
        Route::post('/course/update/{id}','updateCourse')->name('update.course');
        Route::get('/course/edit/{id}','editCourse')->name('edit.course');
        Route::get('/course/delete/{id}','deleteCourse')->name('delete.course');
    });
    Route::controller(DepartmentController::class)->group(function (){
        Route::get('/create/department','CreateDepartment')->name('manage.department');
        Route::post('/department/store','storeDepartment')->name('store.department');
        Route::post('/department/update','updateDepartment')->name('update.department');
        Route::get('/department/edit/{id}','editDepartment')->name('edit.department');
        Route::get('/department/delete/{id}','deleteDepartment')->name('delete.department');
    });
    Route::controller(RegistrationController::class)->group(function (){
        Route::get('/student/registration','newRegistration')->name('new.registration');
        Route::post('/store/registration','storeRegistration')->name('store.registration');
    });

    Route::controller(AdmitController::class)->group(function (){
        Route::get('/admit/generate','admitGenerate')->name('admit.generate');
        Route::post('/store/admit','storeAdmit')->name('store.admit');
        Route::get('/delete/admit/{id}','deleteAdmit')->name('delete.admit');
    });
    Route::controller(ExamScheduleController::class)->group(function (){
        Route::get('/exam/schedule','examSchedule')->name('exam.schedule');
        Route::post('/date-range','dateRange')->name('date-range');
        Route::post('/schedule','schedule');
        Route::get('/get-subject-ajax/{id}','subjectAjax');
        Route::get('/download/schedule/{exam}','downloadSchedule')->name('download.schedule');
    });
});


Route::middleware(['auth', 'role:student'])->group(function () {
    Route::controller(StudentController::class)->group(function (){
        Route::get('/student/dashboard','index')->name('student.dashboard');
        Route::get('/admit/card','getAdmit')->name('get.admit.card');
    });
});


Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::controller(TeacherController::class)->group(function (){
        Route::get('/teacher/dashboard','index')->name('teacher.dashboard');
    });
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::controller(AdmitVerifyController::class)->group(function (){
        Route::get('/admit/verify/{sid}','admitVerify')->name('admit.verify');
    });
});

require __DIR__.'/auth.php';
