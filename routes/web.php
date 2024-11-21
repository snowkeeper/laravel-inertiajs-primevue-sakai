<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});

Route::get('/documentation', function () {
    return Inertia::render('Documentation');
});

Route::inertia('/landing', 'Landing');
Route::inertia('/pages/notfound', 'NotFound');
Route::inertia('/pages/empty', 'Empty');
Route::inertia('/auth/login', 'Auth/Login');
Route::inertia('/auth/error', 'Auth/Error');
Route::inertia('/auth/access', 'Auth/Access');
Route::inertia('/pages', 'Crud');
Route::inertia('/uikit/charts', 'uikit/ChartDoc');
Route::inertia('/uikit/formlayout', 'uikit/FormLayout');
Route::inertia('/uikit/input', 'uikit/InputDoc');
Route::inertia('/uikit/button', 'uikit/ButtonDoc');
Route::inertia('/uikit/table', 'uikit/TableDoc');
Route::inertia('/uikit/input', 'uikit/InputDoc');
Route::inertia('/uikit/media', 'uikit/MediaDoc');
Route::inertia('/uikit/message', 'uikit/MessagesDoc');
Route::inertia('/uikit/menu', 'uikit/MenuDoc');
Route::inertia('/uikit/file', 'uikit/FileDoc');
Route::inertia('/uikit/tree', 'uikit/TreeDoc');
Route::inertia('/uikit/list', 'uikit/ListDoc');
Route::inertia('/uikit/panel', 'uikit/PanelsDoc');
Route::inertia('/uikit/overlay', 'uikit/OverlayDoc');
Route::inertia('/uikit/misc', 'uikit/MiscDoc');
Route::inertia('/uikit/timeline', 'uikit/TimelineDoc');
Route::inertia('/uikit/documentation', 'uikit/Documentation');

Route::get('/pages/crud', function () {
    return Inertia::render('Crud');
});

Route::get('/dashboard2', function () {
    return Inertia::render('Dashboard2');
});

Route::get('/dashboard3', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
