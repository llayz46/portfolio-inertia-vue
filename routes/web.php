<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologyController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class)->name('landing');
Route::get('projects/{project}/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::resource('contact', ContactController::class)->only(['index', 'store']);

Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('projects/{project}/{slug}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::resource('projects', ProjectController::class)->only(['store', 'create', 'update']);
    Route::resource('technologies', TechnologyController::class)->only(['store', 'create', 'destroy']);
});
