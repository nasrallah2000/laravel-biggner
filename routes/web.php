<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RelationsController;

// The Type Of routes method
// Route::get('url','action'); الروابط المتعلقة بعرض صفحات الموقع
// Route::post('url','action'); الروابط المتعلقة باخذ بيانات من المستخدم
// Route::put('url','action'); الروابط المسؤولة عن تعديل البيانات (احدث وتعدل عنصر واحد)
// Route::patch('url','action'); الروابط المسؤولة عن تعديل البيانات (اقدم وتعدل اكثر من عنصر)
// Route::delete('url','action'); الروابط المسؤولة عن حذف البيانات
// Route::options('url','action'); مسؤول عن عرض الاخطاء المناسبة

// Route::get('/', function () {
//     $link = route('About-Us');
//     return "<a href = '$link'>About Us<a>";
// });

// Route::get('/about-me', function () {
//     return "This is About me Page";
// })->name('About-Us');


// Route::get('/contact-us', function () {
//     return "Contact Us";
// });

// Route::get('/course/{name}/{type?}', function ($name, $type = "online") {
//     return 'Course Name : ' . $name . ' & Type : ' . $type;
// });

// Route::get('/subject/{name?}', function ($name = '') {
//     return "Subject $name";
// })->whereAlpha('name');


// Route::get('/', [MainController::class, 'index']);

// index , about, team , services , blog , articles

// Route::get('/', [SiteController::class, 'index'])->name('index');
// Route::get('/about', [SiteController::class, 'about'])->name('about');
// Route::get('/team', [SiteController::class, 'team'])->name('team');
// Route::get('/services', [SiteController::class, 'services'])->name('services');
// Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
// Route::get('/articles', [SiteController::class, 'articles'])->name('articles');

// Controller Type :
// Empty Controller
// Resource Controller الخاص باجراء العمليات لنوع من البيانات (روابط 7)
// Resource Api Controller اجراء عملبات على api (5 روابط)
// Invoke Controller

// Route::resource('products', ProductController::class);
// Route::resource('categories', CategoryController::class);


// Send data between pages///

// Route::get('user/{name}/{age}', [MainController::class, 'user'])->name('user.profile');

////////////////////// Personal Site ////////////////////
Route::prefix('personal')->name('personal.')->group(function () {

    Route::get('/', [PersonalController::class, 'index'])->name('index');
    Route::get('/resume', [PersonalController::class, 'resume'])->name('resume');
    Route::get('/projects', [PersonalController::class, 'projects'])->name('projects');
    Route::get('/contact', [PersonalController::class, 'contact'])->name('contact');
    Route::post('/contant', [PersonalController::class, 'contant-data'])->name('contant-data');
});

////////////////////// Blog Site ////////////////////

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('about', [BlogController::class, 'about'])->name('about');
    Route::get('contact', [BlogController::class, 'contact'])->name('contact');
    Route::get('post', [BlogController::class, 'post'])->name('post');
});

////////////////////// Form Site ////////////////////

Route::get('/form1', [FormController::class, 'form1'])->name('form1');
Route::post('/form1', [FormController::class, 'form1_data'])->name('form1_data');

Route::get('user', [FormController::class, 'user'])->name('user');
Route::post('user', [FormController::class, 'user_data'])->name('user_data');

Route::get('form2', [FormController::class, 'form2'])->name('form2');
Route::post('form2', [FormController::class, 'form2_data'])->name('form2_data');


Route::get('form3', [FormController::class, 'form3'])->name('form3');
Route::post('form3', [FormController::class, 'form3_data'])->name('form3_data');

Route::get('form4', [FormController::class, 'form4'])->name('form4');
Route::post('form4', [FormController::class, 'form4_data'])->name('form4_data');

Route::get('email', [EmailController::class, 'email'])->name('email');
Route::post('email', [EmailController::class, 'email_data'])->name('email_data');

///// Course All Route (CRUD)

// Route::prefix('courses')->name('courses.')->group(function () {
//     Route::get('/',[CourseController::class,'index'])->name('indedx');
//     Route::get('/{course}',[CourseController::class,'show'])->name('show');
//     Route::get('/create_course',[CourseController::class,'create_course'])->name('create_course');
//     Route::post('/create_course',[CourseController::class,'store_course'])->name('store_course');
//     Route::get('/{course}/edit',[CourseController::class,'edit'])->name('edit');
//     Route::match(['put','patch'],'/{course}',[CourseController::class,'update'])->name('update');
//     Route::delete('/{course}',[CourseController::class,'destroy'])->name('destroy');
// });

Route::get('courses/trash', [CourseController::class, 'trash'])->name('courses.trash');
Route::get('courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');
Route::delete('courses/{course}/forcedelete', [CourseController::class, 'forcedelete'])->name('courses.forcedelete');
Route::resource('courses', CourseController::class);



// Relations
Route::get('users',[RelationsController::class,'users'])->name('relation.users');
Route::get('profile/{id}',[RelationsController::class,'profile'])->name('relation.profile');

Route::get('posts',[RelationsController::class,'posts'])->name('relation.posts');
Route::get('posts/{id}',[RelationsController::class,'post_single'])->name('relation.post_single');
Route::get('related_posts/{id}',[RelationsController::class,'related_post'])->name('relation.related_post');

//
