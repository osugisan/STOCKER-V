<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/items', function () {
    return Inertia::render('Items/Index');
})->middleware(['auth', 'verified'])->name('items.index');

Route::get('/items/create', function () {
    $randomNumber = rand(1, 6);
    $imagePath = "/images/item-{$randomNumber}.jpg";
    return Inertia::render('Items/Create', [ 'imagePath' => $imagePath ]);
})->middleware(['auth', 'verified'])->name('items.create');

Route::get('/items/show', function () {
    return Inertia::render('Items/Show');
})->middleware(['auth', 'verified'])->name('items.show');

Route::get('/items/history', function () {
    return Inertia::render('Items/History');
})->middleware(['auth', 'verified'])->name('items.history');

Route::get('/groups', function () {
    return Inertia::render('Groups');
})->middleware(['auth', 'verified'])->name('groups');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
