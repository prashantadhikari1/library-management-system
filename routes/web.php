<?php

use App\Faculty;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\IssueListController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Student;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('/');

// Route::resource('student',[]);

//Faulty related Routes
// Route::resource('faculty', FacultyController::class);
Route::get('faculty',[FacultyController::class, 'index'])->name('faculty');
Route::get('faculty/create',[FacultyController::class, 'create'])->name('faculty.create');
Route::post('faculty/store',[FacultyController::class, 'store'])->name('faculty.store');
Route::get('faculty/edit/{id}',[FacultyController::class, 'edit'])->name('faculty.edit');
Route::put('faculty/update/{id}',[FacultyController::class, 'update'])->name('faculty.update');
Route::delete('faculty/delete/{id}',[FacultyController::class, 'destroy'])->name('faculty.delete');
Route::get('faculty/inactive/{id}',[FacultyController::class, 'inactive'])->name('faculty.inactive');
Route::get('faculty/active/{id}',[FacultyController::class, 'active'])->name('faculty.active');

//Student related Routes
Route::get('student', [StudentController::class, 'index'])->name('student');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('student/update/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
Route::get('student/inactive/{id}', [StudentController::class, 'inactive'])->name('student.inactive');
Route::get('student/active/{id}', [StudentController::class, 'active'])->name('student.active');

//Book related Routes
Route::get('book', [BookController::class, 'index'])->name('book');
Route::get('book/create', [BookController::class, 'create'])->name('book.create');
Route::post('book/store', [BookController::class, 'store'])->name('book.store');
Route::get('book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('book/update/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('book/delete/{book}', [BookController::class, 'destroy'])->name('book.delete');
Route::get('book/inactive/{id}', [BookController::class, 'inactive'])->name('book.inactive');
Route::get('book/active/{id}', [BookController::class, 'active'])->name('book.active');

//Issue related Routes
Route::get('issue', [IssueController::class, 'index'])->name('issue');
Route::get('issue/book', [IssueController::class, 'create'])->name('issue.create');
Route::post('issue/store', [IssueController::class, 'store'])->name('issue.store');
Route::get('issue/return/{id}', [IssueController::class, 'completeStatus'])->name('issue.return');
// Route::get('issue/view/{id}', [IssueListController::class, 'index'])->name('issue.view');
Route::get('issue/view/{id}', [IssueListController::class, 'view'])->name('issue.view');
Route::post('issue', [IssueController::class, 'filter'])->name('issue.filter');

//Report related Routes
Route::get('report', [ReportController::class, 'index'])->name('report');
Route::post('report', [ReportController::class, 'studFilter'])->name('report.filter');

//Role related Routes
Route::get('role', [RoleController::class, 'index'])->name('role');
Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
Route::put('role/update/{role}', [RoleController::class, 'update'])->name('role.update');
Route::delete('role/delete/{role}', [RoleController::class, 'destroy'])->name('role.delete');
Route::get('role/inactive/{id}', [RoleController::class, 'inactive'])->name('role.inactive');
Route::get('role/active/{id}', [RoleController::class, 'active'])->name('role.active');

//User related Routes
Route::get('user',[UserController::class, 'index'])->name('user');
Route::get('user/create',[UserController::class, 'create'])->name('user.create');
Route::post('user/store',[UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::put('user/update/{user}',[UserController::class, 'update'])->name('user.update');
Route::delete('user/delete/{user}',[UserController::class, 'destroy'])->name('user.delete');
Route::get('user/inactive/{id}', [UserController::class, 'inactive'])->name('user.inactive');
Route::get('user/active/{id}', [UserController::class, 'active'])->name('user.active');


Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('auth.logout');

Route::get('/home', 'HomeController@index')->name('home');
