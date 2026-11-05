<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Frontend\CheckEligibilityController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\IndustryController;
use App\Http\Controllers\Student\ProfileController;
use App\SEO\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

//Routes
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('/signup', function () {
    return view('backend.pages.auth.signup');
})->name('signup');

Route::get('/generate-sitemap', [SitemapController::class, 'generate']);

//static pages
Route::get('/', [FrontendController::class, 'homePage'])->name('home');
Route::get('/how-we-works', [FrontendController::class, 'howWeWork'])->name('how-we-works');
Route::get('/patners', [FrontendController::class, 'patners'])->name('patners');
Route::get('/about', [FrontendController::class, 'aboutPage'])->name('about');
Route::get('/contact', [FrontendController::class, 'contactPage'])->name('contact');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs');
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [FrontendController::class, 'termsConditions'])->name('terms-conditions');

Route::post('/inquiry-us', [ContactController::class, 'store'])->name('contact.store');

Route::get('/industries/{slug}', [IndustryController::class, 'index'])
    ->name('industries.index');
Route::get('/courses/{slug}', [IndustryController::class, 'show'])
    ->name('course.show');

Route::get('/check-eligibility', [CheckEligibilityController::class, 'index'])
    ->name('eligibility');

Route::post('/eligibility/submit', [CheckEligibilityController::class, 'submit'])
    ->name('eligibility.submit');

//student routes
Route::prefix('student')
    ->name('student.')
    ->middleware(['auth', 'active.user'])
    ->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])
            ->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        

    });
