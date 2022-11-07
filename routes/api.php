<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProgressController;
use App\Http\Controllers\Api\InstructorController;
use App\Http\Controllers\Api\CategoryCarsController;
use App\Http\Controllers\Api\CarProgressesController;
use App\Http\Controllers\Api\StudentProgressesController;
use App\Http\Controllers\Api\InstructorProgressesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('cars', CarController::class);

        // Car Progresses
        Route::get('/cars/{car}/progresses', [
            CarProgressesController::class,
            'index',
        ])->name('cars.progresses.index');
        Route::post('/cars/{car}/progresses', [
            CarProgressesController::class,
            'store',
        ])->name('cars.progresses.store');

        Route::apiResource('categories', CategoryController::class);

        // Category Cars
        Route::get('/categories/{category}/cars', [
            CategoryCarsController::class,
            'index',
        ])->name('categories.cars.index');
        Route::post('/categories/{category}/cars', [
            CategoryCarsController::class,
            'store',
        ])->name('categories.cars.store');

        Route::apiResource('students', StudentController::class);

        // Student Progresses
        Route::get('/students/{student}/progresses', [
            StudentProgressesController::class,
            'index',
        ])->name('students.progresses.index');
        Route::post('/students/{student}/progresses', [
            StudentProgressesController::class,
            'store',
        ])->name('students.progresses.store');

        Route::apiResource('instructors', InstructorController::class);

        // Instructor Progresses
        Route::get('/instructors/{instructor}/progresses', [
            InstructorProgressesController::class,
            'index',
        ])->name('instructors.progresses.index');
        Route::post('/instructors/{instructor}/progresses', [
            InstructorProgressesController::class,
            'store',
        ])->name('instructors.progresses.store');

        Route::apiResource('progresses', ProgressController::class);
    });
