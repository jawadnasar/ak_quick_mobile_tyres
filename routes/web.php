<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserFeedbackController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutController::class, 'aboutUs'])->name('about-us');
Route::get('/testimonials', [AboutController::class, 'Testimonials'])->name('testimonials');
Route::get('/team', [AboutController::class, 'Team'])->name('team');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{project}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/request-a-quote', [ContactController::class, 'quote'])->name('quote');
Route::post('/contact/add', [ContactController::class, 'add'])->name('contact.add');

Route::get('/privacy-policy', [LegalController::class, 'privacy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [LegalController::class, 'terms'])->name('terms');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/add', [CategoryController::class, 'add'])->name('categories.add');
    Route::post('/categories/save', [CategoryController::class, 'save'])->name('categories.save');
    Route::get('/categories/getall', [CategoryController::class, 'getall'])->name('categories.getall');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/getall_filtered', [CategoryController::class, 'filter'])->name('categories.getall_filtered');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/add', [ProjectController::class, 'add'])->name('projects.add');
    Route::post('/projects/save', [ProjectController::class, 'save'])->name('projects.save');
    Route::get('/projects/getall', [ProjectController::class, 'getall'])->name('projects.getall');
    Route::get('/projects/view/{id}', [ProjectController::class, 'view'])->name('projects.view');
    Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::post('/projects/update', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/getall_filtered', [ProjectController::class, 'filter'])->name('projects.getall_filtered');
    Route::delete('projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::get('/feedbacks', [UserFeedbackController::class, 'index'])->name('feedbacks.index');
    Route::get('/feedbacks/getall', [UserFeedbackController::class, 'getall'])->name('feedbacks.getall');
    Route::get('/feedbacks/view/{id}', [UserFeedbackController::class, 'view'])->name('feedbacks.view');
    Route::get('/feedbacks/getall_filtered', [UserFeedbackController::class, 'filter'])->name('feedbacks.getall_filtered');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/custom-logout', [AuthenticatedSessionController::class, 'logout'])->name('custom.logout');

require __DIR__.'/auth.php';
