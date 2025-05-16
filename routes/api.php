<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillTypeController;
use App\Http\Controllers\UserController;

Route::apiResource('skills', SkillController::class)->names([
    'index' => 'skills.index',
    'store' => 'skills.store',
    'show' => 'skills.show',
    'update' => 'skills.update',
    'destroy' => 'skills.destroy',
]);
Route::apiResource('skill-types', SkillTypeController::class)->names([
    'index' => 'skillTypes.index',
    'store' => 'skillTypes.store',
    'show' => 'skillTypes.show',
    'update' => 'skillTypes.update',
    'destroy' => 'skillTypes.destroy',
]);

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('', 'index')->name('users.index');
    Route::get('{userId}', 'show')->name('users.show');
    Route::get('{userId}/skills', 'getSkills')->name('users.getSkills');
});

Route::get('/user/{username}', [UserController::class, 'showByUsername'])->name('users.showByUsername');
Route::get('/owner', [UserController::class, 'showOwner'])->name('users.showOwner');
