<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LoginUser;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//normal user
Route::redirect('/','home');
Route::get('home',[UserController::class,'userHome'])->name('user#home');
// filter
Route::get('filter/{type}',[userController::class,'filter'])->name('user#filter');
Route::get('genres/{genre}',[userController::class,'genres'])->name('user#genres');
Route::post('load',[UserController::class,'load'])->name('user#load');
Route::get('detail/{id}',[UserController::class,'userdetail'])->name('user#detail');
Route::get('view/{chapterId}/chapter-{chapterNumber}',[UserController::class,'view'])->name('user#view');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard'); // admin user role
    // admin
     Route::group(['prefix'=> 'admin','middleware' => 'admin_auth'], function () {
        Route::get('home',[AdminController::class,'home'])->name('admin#home');
        Route::get('createPage',[AdminController::class,'createPage'])->name('admin#createPage');
        Route::post('create',[AdminController::class,'create'])->name('admin#create');
        Route::get('manga/delete/{id}',[AdminController::class,'mangaDelete'])->name('admin#mangaDelete');
        Route::get('detail/{id}',[AdminController::class,'detail'])->name('admin#detail');
        Route::post('chapter',[ChapterController::class,'uploadChapter'])->name('admin#uploadChapter');
        Route::get('chapter/delete/{chapterId}/{chapterNumber}',[AdminController::class,'chapterDelete'])->name('admin#chapterDelete');
        Route::get('view/{chapterId}/chapter-{chapterNumber}',[ChapterController::class,'view'])->name('admin#view');
        // account management
        Route::get('account-management',[AdminController::class,'account'])->name('admin#account');
        // change admin user
        Route::get('change/role',[AdminController::class,'changeRole'])->name('admin#changeRole');
        // account delete
        Route::get('account/delete/{userId}',[AdminController::class,'accountDelete'])->name('admin#accountDelete');
        // Message
        Route::get('message',[AdminController::class,'message'])->name('admin#message');
        Route::get('message/delete/{id}',[AdminController::class,'messageDelete'])->name('admin#Deletemessage');
     });

     //login user
    Route::group(['prefix'=> 'user','middleware' => 'user_auth'], function () {
        Route::get('home',[LoginUser::class,'userHome'])->name('loginUser#home');
        Route::post('message',[LoginUser::class,'message'])->name('loginUser#mssage');
        // filter
        Route::get('filter/{type}',[LoginUser::class,'filter'])->name('loginUser#filter');
        Route::get('genres/{genre}',[LoginUser::class,'genres'])->name('loginUser#genres');
        Route::post('load',[LoginUser::class,'load'])->name('loginUser#load');
        Route::get('detail/{id}',[LoginUser::class,'userdetail'])->name('loginUser#detail');
        Route::get('view/{chapterId}/chapter-{chapterNumber}',[LoginUser::class,'view'])->name('loginUser#view');
     });
});
