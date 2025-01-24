<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Home Page";
});
Route::get('/contact-us', function () {
    return "Contact Us";
});
