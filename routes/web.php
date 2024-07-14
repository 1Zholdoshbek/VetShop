<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'], function (){
    Route::get('/',[IndexController::class,'index']);

    Route::group(['prefix'=>'category'],function (){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('/create',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::patch('/{category}/update',[CategoryController::class,'update'])->name('admin.category.update');
        Route::delete('/{category}/destroy',[CategoryController::class,'destroy'])->name('admin.category.destroy');
    });
});


