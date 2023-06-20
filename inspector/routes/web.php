<?php

use App\Http\Controllers\ModelController;
use App\Http\Controllers\PieceController;
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

Route::get('/home', function () {
    return Inertia::render('Home');
})->name('home.index');

Route::get('/campaigns', function () {
    return Inertia::render('Campaigns');
})->name('campaigns.index');

Route::get('/materials', function () {
    return Inertia::render('Materials');
})->name('materials.index');

Route::resource('/pieces', PieceController::class);

// Route::get('/pieces', function () {
//     return Inertia::render('Pieces');
// })->name('pieces.index');

Route::get('/dash', function () {
    return Inertia::render('Dash');
})->name('dash.index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('campaign', CampaignController::class);
Route::resource('constructor', ConstructorController::class);
Route::resource('material', MaterialController::class);
Route::resource('model', ModelController::class);
Route::resource('piece', PieceController::class);
Route::resource('role', RoleController::class);
Route::resource('site', SiteController::class);
Route::resource('type', TypeController::class);
Route::resource('audit', AuditController::class);

require __DIR__.'/auth.php';
