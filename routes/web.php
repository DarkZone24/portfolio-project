<?php

use App\Http\Controllers\HireMeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

// Main portfolio page
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.home');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');

// Portfolio sections (these will be created later)
Route::get('/about', [PortfolioController::class, 'about'])->name('portfolio.about');
Route::get('/services', [PortfolioController::class, 'services'])->name('portfolio.services');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('portfolio.skills');

// Contact routes (these will be created later)
Route::get('/contact', [PortfolioController::class, 'contact'])->name('portfolio.contact');
Route::post('/contact', [PortfolioController::class, 'contactStore'])->name('portfolio.contact.store');

// CV download
Route::get('/download-cv', [PortfolioController::class, 'downloadCV'])->name('portfolio.download-cv');

// Simple routes for service details (temporary)
Route::get('/web-services', function () {
    return view('portfolio.web-services');
})->name('portfolio.web');

Route::get('/design-services', function () {
    return view('portfolio.design-services');
})->name('portfolio.design');


// Public routes for hire me form
Route::get('/hire-me', [HireMeController::class, 'index'])->name('hire-me.index');
Route::post('/hire-me', [HireMeController::class, 'store'])->name('hire-me.store');

// Admin routes (protected by auth middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/hire-inquiries', [HireMeController::class, 'admin'])->name('admin.hire-inquiries');
    Route::patch('/admin/hire-inquiries/{id}/status', [HireMeController::class, 'updateStatus'])->name('admin.hire-inquiries.update-status');
});

// ============================================
// API routes (routes/api.php) - Optional
// ============================================

Route::post('/hire-me', [HireMeController::class, 'store'])->name('api.hire-me.store');

Route::get('/test-mail', function () {
    Mail::raw('This is a test email from Laravel via Mailtrap.', function ($message) {
        $message->to('anyone@example.com') // kahit anong email, lalabas sa Mailtrap inbox
                ->subject('Laravel Test Mail');
    });

    return 'Test email sent! Check your Mailtrap inbox.';
});


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
