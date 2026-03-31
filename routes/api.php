<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\GoalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProgressController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);


    Route::apiResource('skills', SkillController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('goals', GoalController::class);
    Route::apiResource('progress', ProgressController::class);
});
