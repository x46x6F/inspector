<?php

use App\Http\Controllers\AuditAPIController;
use Illuminate\Http\Request;
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

Route::get('audits', [AuditAPIController::class, 'index']);
Route::get('audits/{campaign}/{piece?}', [AuditAPIController::class, 'show']);
Route::patch('audits/{campaign}/{piece}', [AuditAPIController::class, 'update']);
Route::delete('audits/{campaign}/{piece}', [AuditAPIController::class, 'destroy']);
