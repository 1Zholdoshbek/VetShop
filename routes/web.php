<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\DrugController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin', 'middleware' => \App\Http\Middleware\RoleMiddleWare::class], function () {
    Route::get('/', [IndexController::class, 'index']);

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}/update', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
    Route::group(['prefix' => 'drug'], function () {
        Route::get('/', [DrugController::class, 'index'])->name('admin.drug.index');
        Route::get('/create', [DrugController::class, 'create'])->name('admin.drug.create');
        Route::get('{drug}',[DrugController::class,'show'])->name('admin.drug.show');
        Route::post('/create', [DrugController::class, 'store'])->name('admin.drug.store');
        Route::get('/{drug}/edit', [DrugController::class, 'edit'])->name('admin.drug.edit');
        Route::patch('/{drug}/update', [DrugController::class, 'update'])->name('admin.drug.update');
        Route::delete('/{drug}/destroy', [DrugController::class, 'destroy'])->name('admin.drug.destroy');

        Route::post('{id}/add-image', [DrugController::class, 'addImage'])->name('admin.drug.addImage');
        Route::delete('{id}/delete-image/{imageId}', [DrugController::class, 'deleteImage'])->name('admin.drug.deleteImage');
    });


    Route::group(['prefix'=>'user'],function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::get('/{user}',[UserController::class,'show'])->name('admin.user.show');
        Route::post('/create', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}/edit',[UserController::class,'edit'])->name('admin.user.edit');
        Route::patch('/{user}/update',[UserController::class,'update'])->name('admin.user.update');
        Route::delete('/{user}/destroy',[UserController::class,'destroy'])->name('admin.user.destroy');

        Route::post('user/{user}/upload', [UserController::class, 'uploadFile'])->name('admin.user.uploadFile');
        Route::delete('user/{user}/gallery/{gallery}', [UserController::class, 'deleteFile'])->name('admin.user.deleteFile');
    });


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
