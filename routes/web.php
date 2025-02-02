<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TechnologyController;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\TechnologyResource;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', LandingController::class)->name('landing');
Route::get('projects/{project}/{slug}', [ProjectController::class, 'show'])->name('projects.show');

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
