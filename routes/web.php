<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DepartmentController;

Route::prefix('admin')->name('admin.')->middleware('auth' , 'user_type')->group(function () {

    Route::get('/', [AdminController::class , 'index'])->name('index');

    Route::resource('departments', DepartmentController::class);

});

Route::get('/', function ()
{
    return 'sss';
})->name('homepage');

Auth::routes();//هذا السطر يحتوي على كل روابط المصادقة

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');// هذا رابط افتراضي يمكن الاستغناء عنه
