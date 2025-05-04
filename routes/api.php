<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillTypeController;
use App\Http\Controllers\UserController;

Route::apiResource('skills', SkillController::class);
Route::apiResource('skill-types', SkillTypeController::class);

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('{userId}', 'show');
    Route::get('{userId}/skills', 'getSkills');
});

Route::get('/user/{username}', [UserController::class, 'showByUsername']);  
Route::get('/owner', [UserController::class, 'showOwner']);
