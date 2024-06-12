<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CourseAdminController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TrainerController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\CourseController;
use App\Http\Controllers\front\HomePageController;
use App\Http\Controllers\front\messageController;
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

///////////////////////////// FRONT ROUTE ////////////////////////////////////////

Route::get('/', [HomePageController::class, 'index'])->name('front.homepage');
Route::get('/show/{id}', [CourseController::class, 'show'])->name('front.show');
Route::get('/show/{id}/course/{c_id}', [CourseController::class, 'showcourse'])->name('front.showcourse');
Route::get('/contact', [ContactController::class, 'index'])->name('front.contact');
Route::post('/message/newslettel', [MessageController::class, 'newslettel'])->name('front.message.newslettel');
Route::post('/message/contact', [MessageController::class, 'contact'])->name('front.message.contact');
Route::post('/message/enroll', [MessageController::class, 'enroll'])->name('front.message.enroll');

///////////////////////////// ADMIN ROUTE ////////////////////////////////////////

Route::Get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::Post('/dashboard', [AuthController::class, 'dologin'])->name('admin.dologin');

Route::middleware(['AdminAuth:admin'])->group(function () {
    Route::Get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::Get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::Get('/categories', [CategoryController::class, 'index'])->name('admin.category');
    Route::Get('/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::Get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::Get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

    Route::Get('/trainers', [TrainerController::class, 'index'])->name('admin.trainers');
    Route::Get('/trainers/create', [TrainerController::class, 'create'])->name('admin.trainers.create');
    Route::post('/trainers/store', [TrainerController::class, 'store'])->name('admin.trainers.store');
    Route::Get('/trainers/edit/{id}', [TrainerController::class, 'edit'])->name('admin.trainers.edit');
    Route::post('/trainers/update', [TrainerController::class, 'update'])->name('admin.trainers.update');
    Route::Get('/trainers/delete/{id}', [TrainerController::class, 'delete'])->name('admin.trainers.delete');

    Route::Get('/courses', [CourseAdminController::class, 'index'])->name('admin.courses');
    Route::Get('/courses/create', [CourseAdminController::class, 'create'])->name('admin.courses.create');
    Route::post('/courses/store', [CourseAdminController::class, 'store'])->name('admin.courses.store');
    Route::Get('/courses/edit/{id}', [CourseAdminController::class, 'edit'])->name('admin.courses.edit');
    Route::post('/courses/update', [CourseAdminController::class, 'update'])->name('admin.courses.update');
    Route::Get('/courses/delete/{id}', [CourseAdminController::class, 'delete'])->name('admin.courses.delete');

    Route::Get('/students', [StudentController::class, 'index'])->name('admin.students');
    Route::Get('/students/create', [StudentController::class, 'create'])->name('admin.students.create');
    Route::post('/students/store', [StudentController::class, 'store'])->name('admin.students.store');
    Route::Get('/students/edit/{id}', [StudentController::class, 'edit'])->name('admin.students.edit');
    Route::Get('/students/courses/{id}', [StudentController::class, 'showcourses'])->name('admin.students.courses');
    Route::post('/students/update', [StudentController::class, 'update'])->name('admin.students.update');
    Route::Get('/students/delete/{id}', [StudentController::class, 'delete'])->name('admin.students.delete');
    Route::Get('/students/{id}/courses/{c_id}/approve', [StudentController::class, 'approve'])->name('admin.students.approve');
    Route::Get('/students/{id}/courses/{c_id}/reject', [StudentController::class, 'reject'])->name('admin.students.reject');
    Route::Get('/students/{id}/register', [StudentController::class, 'register'])->name('admin.students.register');
    Route::post('/students/{id}/addcourse', [StudentController::class, 'addcourse'])->name('admin.students.addcourse');

    Route::Get('/admins', [AdminController::class, 'index'])->name('admin.admins');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admin.admins.create');
    Route::post('/admins/store', [AdminController::class, 'store'])->name('admin.admins.store');
    Route::Get('/admins/edit/{id}', [AdminController::class, 'edit'])->name('admin.admins.edit');
    Route::post('/admins/update', [AdminController::class, 'update'])->name('admin.admins.update');
    Route::Get('/admins/delete/{id}', [AdminController::class, 'edit'])->name('admin.admins.delete');

    Route::Get('/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::Get('/settings/edit/{id}', [SettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('admin.settings.update');

});
