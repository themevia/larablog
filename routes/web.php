<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;

Route::get('/', [\App\Http\Controllers\Controller::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->prefix('/dashboard')->group(function () {
    Route::get('/',[DashboardController::class,'index'])
        ->name('dashboard');

    Route::prefix('/posts')->group(function () {
        Route::get('/',[DashboardController::class,'posts'])
            ->name('posts');

        Route::get('/show/{title:slug}',[DashboardController::class,'post_show'])
            ->name('posts.show');
        Route::get('/edit/{title:slug}',[DashboardController::class,'post_edit'])
            ->name('posts.edit');
        Route::get('/create/{title:slug?}',[DashboardController::class,'post_create'])
            ->name('posts.create');
        Route::get('/bin',[DashboardController::class,'post_bin'])
            ->name('posts.bin');

        Route::post('/remove/{post:id}',[DashboardController::class,'__post_remove'])
            ->name('posts.remove');
        Route::post('/restore/{post:id}',[DashboardController::class,'__post_restore'])
            ->name('posts.restore');
        Route::post('/create',[DashboardController::class,'__post_create'])
            ->name('posts.create');
    });
    Route::prefix('/categories')->group(function () {
        Route::get('/',[DashboardController::class,'categories'])
            ->name('categories');

        Route::get('/edit/{title:slug}',[DashboardController::class,'category_edit'])
            ->name('categories.edit');
        Route::get('/create/{title:slug?}',[DashboardController::class,'category_create'])
            ->name('categories.create');

        Route::post('/remove/{post:id}',[DashboardController::class,'__category_remove'])
            ->name('categories.remove');
        Route::post('/restore/{post:id}',[DashboardController::class,'__category_restore'])
            ->name('categories.restore');
        Route::post('/create',[DashboardController::class,'__category_create'])
            ->name('categories.create');
    });

    Route::get('/page-builder',[DashboardController::class,'pageBuilder'])
        ->name('pageBuilder');

});
