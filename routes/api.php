<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('me', [AuthController::class, 'me']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::post('refresh', [AuthController::class, 'refresh']);

    Route::get('/rentals/{id}', [RentalController::class, 'get']);
    Route::get('/rentals', [RentalController::class, 'list']);
    Route::post('/rentals', [RentalController::class, 'insert']);

    Route::get('/movies', [MoviesController::class, 'index']);
    Route::get('/movies/{id}', [MoviesController::class, 'get']);
    Route::patch('/movies/{id}', [MoviesController::class, 'setLike']);

    Route::get('/genres', [GenresController::class, 'index']);
    Route::get('/genres/{id}', [GenresController::class, 'get']);

    Route::get('/users/{id}', [UserController::class, 'get']);

    Route::get('/rentals/{id}', [RentalController::class, 'get']);
    Route::get('/rentals', [RentalController::class, 'list']);
});

Route::group(['middleware' => ['jwt.auth', 'profile']], function () {
    Route::post('/users', [UserController::class, 'register']);
    Route::get('/users', [UserController::class, 'list']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::patch('/users/{id}', [UserController::class, 'disableEnable']);

    Route::post('/rentals', [RentalController::class, 'insert']);
    Route::put('/rentals/{id}', [RentalController::class, 'update']);
    Route::delete('/rentals/{id}', [RentalController::class, 'delete']);

    Route::post('/genres', [GenresController::class, 'insert']);
    Route::put('/genres/{id}', [GenresController::class, 'update']);
    Route::delete('/genres/{id}', [GenresController::class, 'delete']);

    Route::post('/movies', [MoviesController::class, 'add']);
    Route::put('/movies/{id}', [MoviesController::class, 'update']);
    Route::delete('/movies/{id}', [MoviesController::class, 'delete']);

    Route::put('/rentals/{id}', [RentalController::class, 'update']);
    Route::delete('/rentals/{id}', [RentalController::class, 'delete']);
});
