<?php

use Illuminate\Support\Facades\Route;


// The Type Of routes method
// Route::get('url','action'); الروابط المتعلقة بعرض صفحات الموقع
// Route::post('url','action'); الروابط المتعلقة باخذ بيانات من المستخدم
// Route::put('url','action'); الروابط المسؤولة عن تعديل البيانات (احدث وتعدل عنصر واحد)
// Route::patch('url','action'); الروابط المسؤولة عن تعديل البيانات (اقدم وتعدل اكثر من عنصر)
// Route::delete('url','action'); الروابط المسؤولة عن حذف البيانات
// Route::options('url','action'); مسؤول عن عرض الاخطاء المناسبة

Route::get('/', function () {
    $link= route('About-Us');
    return "<a href = '$link'>About Us<a>";
});
Route::get('/about-me', function () {
    return "This is About me Page";
})->name('About-Us');


Route::get('/contact-us', function () {
    return "Contact Us";
});

Route::get('/course/{name}/{type?}', function ($name, $type = "online") {
    return 'Course Name : ' . $name . ' & Type : ' . $type;
});
