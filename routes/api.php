<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillTypeController;
use App\Http\Controllers\UserController;

Route::apiResource('skills', SkillController::class);
Route::apiResource('skill-types', SkillTypeController::class);

Route::get('/users/{userId}', [UserController::class, 'show']);
Route::get('/users/{userId}/skills', [UserController::class, 'getSkills']);
Route::get('/user/{username}', [UserController::class, 'showByUsername']);
