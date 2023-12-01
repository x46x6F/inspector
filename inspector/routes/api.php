<?php

use App\Http\Controllers\AuditAPIController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('audits', [AuditAPIController::class, 'index'])->middleware('auth:sanctum');
Route::get('audits/{campaign}/{piece?}', [AuditAPIController::class, 'show']);
Route::patch('audits/{campaign}/{piece}', [AuditAPIController::class, 'update']);
// Route::delete('audits/{campaign}/{piece}', [AuditAPIController::class, 'destroy']);

Route::middleware('api')->group(function () {
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});
