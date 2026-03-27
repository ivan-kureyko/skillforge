<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

/**
 * Logout user
 *
 * Deletes current API token.
 */
Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Logged out successfully',
    ]);
});

/**
 * Get current user
 *
 * Requires Bearer token.
 */
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});
