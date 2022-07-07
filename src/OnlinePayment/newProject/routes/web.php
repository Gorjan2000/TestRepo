<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/Users', [UserController::class, 'getUsers'])->name('Users')->middleware('admin');
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class)->middleware('admin');
Route::get('/search', [UserController::class, 'GetUser'])->name('search');
Route::get('/audit', [AuditController::class, 'showAudit'])->name('audit')->middleware('admin');
Route::get('profile/{id}/edit', [UserController::class, 'editProfile'])->name('editProfile');
Route::any('profile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::resource('company', CompanyController::class)->middleware('admin');
Route::resource('item', ItemController::class);
Route::resource('invoice', InvoiceController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
