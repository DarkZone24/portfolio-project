<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

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
