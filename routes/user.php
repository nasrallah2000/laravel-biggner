<?php

use Illuminate\Support\Facades\Route;



Route::prefix('user')->name('user.')->group(function () {
    Route::get("/profile", function () {
        return "User Profile";
    })->name('profile');
    Route::get("/comments", function () {
        return "User Comments";
    })->name('comments');
    Route::get("/likes", function () {
        return "User Likes";
    })->name('likes');
    Route::get("/courses", function () {
        return "User Courses";
    })->name('courses');
});
