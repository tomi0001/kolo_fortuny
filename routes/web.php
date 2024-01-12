<?php

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

Route::get('/',[App\Http\Controllers\MainController::class, 'main'])
                    ->name("main");
Route::get('/loadPage2', [App\Http\Controllers\MainController::class, 'loadPage2'])->name('loadPage2');
Route::get('/loadPageNext', [App\Http\Controllers\MainController::class, 'loadPageNext'])->name('loadPageNext');

Auth::routes();
Route::get('/root',[App\Http\Controllers\AdminController::class, 'main'])
                    ->name("admin.main")
                    ->middleware('auth');
Route::get('/root/changePassword',[App\Http\Controllers\AdminController::class, 'changePassword'])
                    ->name("admin.changePassword")
                    ->middleware('auth');
Route::post('/root/changePasswordSubmit',[App\Http\Controllers\AdminController::class, 'changePasswordSubmit'])
                    ->name("admin.changePasswordSubmit")
                    ->middleware('auth');
Route::get('/root/statistik/{type?}',[App\Http\Controllers\AdminController::class, 'statistik'])
                    ->name("admin.statistik")
                    ->middleware('auth');
Route::get('/root/addTtile/',[App\Http\Controllers\AdminController::class, 'addTtile'])
                    ->name("admin.addTtile")
                    ->middleware('auth');
Route::get('/root/addTitleSubmit/',[App\Http\Controllers\AdminController::class, 'addTitleSubmit'])
                    ->name("admin.addTitleSubmit")
                    ->middleware('auth');
Route::get('/root/showCategories/{type?}',[App\Http\Controllers\AdminController::class, 'showCategories'])
                    ->name("admin.showCategories")
                    ->middleware('auth');
Route::get('/root/updateCategories',[App\Http\Controllers\AdminController::class, 'updateCategories'])
                    ->name("admin.updateCategories")
                    ->middleware('auth');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logoutt');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



