<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Category\Controllers\CategoryController;
use Modules\Admin\Comment\Controllers\CommentController;
use Modules\Admin\Post\Controllers\PostController;
use Modules\Admin\Main\Controllers\MainController;
use Modules\Admin\Tag\Controllers\TagController;
use Modules\Admin\User\Controllers\UserController;
use Modules\Authentication\app\Controllers\ProfileController;
use Modules\Home\Post\Controllers\PostController as HomePostController;
use Modules\Home\Profile\Controllers\ProfileController as HomeProfileController;
use Modules\Home\Post\Controllers\CommentController as HomeCommentController;
use Modules\Home\Main\Controllers\MainController as HomeMainController;

// HOME
Route::prefix('/')->name('home.')->group(function (){

    // START: MAIN
    Route::get('', [HomeMainController::class, 'index'])->name('index');
    // END: MAIN

    // START: SortBy
    Route::get('sortBy={state}', [HomeMainController::class, 'sortBy'])->name('sortBy');
    // END: SortBy

    // START: CREATE POST
    Route::get('create-post', [HomePostController::class, 'create'])->name('posts.create');
    Route::post('create-post', [HomePostController::class, 'store'])->middleware('auth')->name('posts.store');
    // END: CREATE POST

    // START: SHOW POST
    Route::prefix('posts/')->name('posts.')->group(function (){
        Route::get('{post:slug}',[HomePostController::class , 'show'])->name('show');
        Route::get('{post}/reaction={reaction}', [HomePostController::class , 'storeReaction'])->name('storeReaction');
        Route::prefix('comments/')->name('comments.')->group(function (){
            Route::post('{post}', [HomeCommentController::class , 'store'])->name('store');
            Route::get('{comment}/reaction={reaction}', [HomeCommentController::class , 'storeReaction'])->name('storeReaction');
        });
    });
    // END: SHOW POST

    // START: PROFILE
    Route::prefix('profile/')->name('profile.')->group(function (){
        Route::get('', [HomeProfileController::class, 'index'])->name('index');
    });
    Route::prefix('profile/')->name('profile.')->group(function (){
        Route::get('',[HomeProfileController::class , 'info'])->name('info');
        Route::get('info',[HomeProfileController::class , 'info'])->name('info');
        Route::post('update',[HomeProfileController::class , 'update'])->name('update');
        Route::get('contacts',[HomeProfileController::class , 'contacts'])->name('contacts');
        Route::get('posts',[HomeProfileController::class , 'posts'])->name('posts');
        Route::get('bookmarks',[HomeProfileController::class , 'bookmarks'])->name('bookmarks');
        Route::get('comments',[HomeProfileController::class , 'comments'])->name('comments');
        Route::get('resetPassword',[HomeProfileController::class , 'resetPassword'])->name('resetPassword');
        Route::post('resetPasswordCheck',[HomeProfileController::class , 'resetPasswordCheck'])->name('resetPasswordCheck');
        Route::get('verifyEmail',[HomeProfileController::class , 'verifyEmail'])->name('verifyEmail');
    });
    // END: PROFILE

});
// END: HOME

// ADMIN
Route::prefix('/management/')->middleware('auth')->name('admin.')->group(function (){

    // START: MAIN
        Route::get('' , [MainController::class, 'index'])->name('index');
    // END: MAIN

    // START:  USERS
    Route::resource('users' , UserController::class);
    Route::get('usersSearch', [UserController::class , 'search'])->name('users.search');
    // END: USERS

    // START: CATEGORIES
    Route::resource('categories' , CategoryController::class);
    Route::get('categoriesSearch', [CategoryController::class , 'search'])->name('categories.search');
    // END: CATEGORIES

    // START: TAGS
    Route::resource('tags' , TagController::class);
    Route::get('tagsSearch', [TagController::class , 'search'])->name('tags.search');
    // END: TAGS

    // START: postS
    Route::resource('posts' , PostController::class);
    Route::get('postsSearch', [PostController::class , 'search'])->name('posts.search');
    Route::get('posts/rejection/{post}', [PostController::class , 'not_qualified'])->name('posts.not_qualified');
    Route::post('posts/rejection/{post}', [PostController::class , 'rejection'])->name('posts.rejection');
    // END: postS

    // START: COMMENTS
    Route::resource('comments' , CommentController::class);
    Route::get('commentsSearch', [CommentController::class , 'search'])->name('comments.search');
    Route::get('/comments/{comment}/change-status', [CommentController::class , 'changeStatus'])->name('comments.changeStatus');
    // END: COMMENTS

});
// END: ADMIN

// START: AUTHENTICATION
Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__ . '/../modules/Authentication/Routes/auth.php';
// END: AUTHENTICATION
