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
Route::delete('audits/{campaign}/{piece}', [AuditAPIController::class, 'destroy']);

Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/tokens/create', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $token = $request->user()->createToken('Token Name')->plainTextToken;

        return response()->json([
            'user' => $request->user()->name,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }else{

        return response()->json(['message' => 'Nom ou mot de passe invalide !'], 401);
    }

})->name('login.api');
