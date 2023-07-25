<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ModelMaterialController;
use App\Http\Controllers\ModelPieceController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dash', function () {
    if (Gate::allows('open-dash')) {
        return Inertia::render('Dash');
    }
})->name('dash.index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', function () {
        return Inertia::render('Home', ['role_id' => Auth::user()->role_id]);
    })->name('home.index');

    Route::resource('admin', UserController::class);

    Route::resource('pieces', PieceController::class);

    Route::resource('campaigns', CampaignController::class);

    Route::resource('constructors', ConstructorController::class);

    Route::resource('materials', MaterialController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('sites', SiteController::class);

    Route::resource('types', TypeController::class);

    Route::resource('audits', AuditController::class);

    Route::prefix('models')->name('models.')->group(function () {
        Route::resource('/pieces', ModelPieceController::class);
        Route::resource('/materials', ModelMaterialController::class);
    });

    Route::post('models/pieces/update', [ModelPieceController::class, 'forceUpdate'])->name('models.pieces.forceUpdate');
    Route::post('materials/test', [MaterialController::class, 'test'])->name('materials.test');
});

require __DIR__ . '/auth.php';
