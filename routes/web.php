<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\UserController;
use \App\Http\Controllers\Admin\AdminDashboardController;
use \App\Http\Controllers\Admin\AdminUserController;
use \App\Http\Controllers\Admin\AdminSongsController;
use \App\Http\Controllers\Admin\AdminCommunicationController;
use \App\Http\Middleware\checkAdmin;
use \App\Http\Middleware\check_account_is_login;

Route::prefix('admin')->middleware(['auth',checkAdmin::class])->group(function (){
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
});



Route::prefix('/')->group(function (){
    Route::get('',[UserController::class,'home'])->name('homePage');
    Route::get('contact',[UserController::class,'contact'])->name('contactPage');
    Route::post('contact',[UserController::class,'send_contact'])->name('send_contact');
    Route::get('about',[UserController::class,'about'])->name('about');




    Route::get('login',[UserController::class,'login'])->name('loginPage');
    Route::post('login',[UserController::class,'checkLogin'])->name('checkLogin');
    Route::get('evaluate',[UserController::class,'evaluate'])->name('evaluate');
    Route::post('evaluate',[UserController::class,'evaluate_send'])->name('evaluate_send');
    Route::get('user/logout',[UserController::class,'logout'])->name('logout');
    Route::post('/store_user',[AdminDashboardController::class,'store'])->name("store_user");
    Route::prefix('user')->middleware(['auth',check_account_is_login::class])->group(function (){
        Route::get('profile',[UserController::class,'user_profile'])->name('user_profile');
        Route::post('update_profile/{id}',[UserController::class,'update_profile'])->name('update_profile');
        Route::get('song/mysong',[\App\Http\Controllers\User\SongController::class,'mysongs'])->name('mysongs');
        Route::get('song/upload',[\App\Http\Controllers\User\SongController::class,'song_upload'])->name('song_upload_page');
        Route::post('song/upload',[\App\Http\Controllers\User\SongController::class,'action_song_upload'])->name('song_upload');
    });


    });

