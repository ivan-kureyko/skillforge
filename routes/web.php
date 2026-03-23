<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth:sanctum')->get('/test-auth', function () {
    return response()->json(['message' => 'You are authenticated ✅']);
});
