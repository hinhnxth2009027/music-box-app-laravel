<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\AdminDashboardController;
use \App\Http\Controllers\Admin\AdminUserController;
use \App\Http\Controllers\Admin\AdminSongsController;
use \App\Http\Controllers\Admin\AdminCommunicationController;

Route::get('/',[AdminDashboardController::class,'overview'])->name("dashboard");
Route::post('/store',[AdminDashboardController::class,'store'])->name("create_new_user");
Route::post('/update/{id}',[AdminDashboardController::class,'update'])->name("update_user");
Route::get('/profile',[AdminDashboardController::class,'profile'])->name("admin_profile");
Route::get('/users',[AdminUserController::class,'list'])->name("list_user");
Route::get('/users/upgrade/{id}',[AdminUserController::class,'user_upgrade'])->name("user_upgrade");
Route::get('/users/detail/{id}',[AdminUserController::class,'user_detail'])->name("User_detail");
Route::get('/users/delete/{id}',[AdminUserController::class,'user_delete'])->name("User_delete");
Route::prefix('/songs')->group(function (){
    Route::get('/',[AdminSongsController::class,'list'])->name("list_songs");
    Route::get('/waiting',[AdminSongsController::class,'list_waiting'])->name("list_songs_waiting");
    Route::get('/delete/{id}',[AdminSongsController::class,'delete_song'])->name("delete_song");
    Route::get('/detail/{id}',[AdminSongsController::class,'detail_song'])->name("detail_song");
    Route::get('/delete/waiting/{id}',[AdminSongsController::class,'delete_song_waiting'])->name("delete_song_waiting");
    Route::get('/release/{id}',[AdminSongsController::class,'release'])->name("release_song");
});
Route::get('feedback',[AdminCommunicationController::class,'feedback_list'])->name('feedback_list');
Route::get('feedback/deactive/{id}',[AdminCommunicationController::class,'feedback_deactive'])->name('feedback_deactive');
Route::get('feedback/active/{id}',[AdminCommunicationController::class,'feedback_active'])->name('feedback_active');
Route::get('contacts',[AdminCommunicationController::class,'contact_list'])->name('contact_list');
Route::get('contact/delete/{id}',[AdminCommunicationController::class,'delete_contact'])->name('delete_contact');
