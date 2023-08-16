<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stat;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('biuro-ksiegowe-czestochowa-kontakt', function(){
    echo 'Formularz kontaktowy';
});

Route::post('biuro-ksiegowe-czestochowa-kontakt', [App\Http\Controllers\ContactFormController::class, 'send']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
Route::middleware('auth')->group(function(){
    Route::resource('pages', App\Http\Controllers\PageController::class, [
        'index' => 'pages.index',
        'create' => 'pages.create',
        'store' => 'pages.store',
        'edit' => 'pages.edit',
        'update' => 'pages.update',
        'show' => 'pages.show',
        'destroy' => 'pages.destroy'
    ]);
    Route::resource('contactForms', App\Http\Controllers\ContactFormController::class, [
        'index' => 'contactForms.index',
        'create' => 'contactForms.create',
        'store' => 'contactForms.store',
        'edit' => 'contactForms.edit',
        'update' => 'contactForms.update',
        'show' => 'contactForms.show',
        'destroy' => 'contactForms.destroy'
    ]);
    Route::resource('testimonials', App\Http\Controllers\TestimonialController::class, [
        'index' => 'testimonials.index',
        'create' => 'testimonials.create',
        'store' => 'testimonials.store',
        'edit' => 'testimonials.edit',
        'update' => 'testimonials.update',
        'show' => 'testimonials.show',
        'destroy' => 'testimonials.destroy'
    ]);
    Route::post('fAQS/ordering', [App\Http\Controllers\FAQController::class, 'ordering']);
    Route::resource('fAQS', App\Http\Controllers\FAQController::class, [
        'index' => 'fAQS.index',
        'create' => 'fAQS.create',
        'store' => 'fAQS.store',
        'edit' => 'fAQS.edit',
        'update' => 'fAQS.update',
        'show' => 'fAQS.show',
        'destroy' => 'fAQS.destroy'
    ]);
    Route::resource('blogs', App\Http\Controllers\BlogController::class, [
        'index' => 'blogs.index',
        'create' => 'blogs.create',
        'store' => 'blogs.store',
        'edit' => 'blogs.edit',
        'update' => 'blogs.update',
        'show' => 'blogs.show',
        'destroy' => 'blogs.destroy'
    ]);
});
Route::post('uploader/b64', [Stat::class, 'uploaderB64']);