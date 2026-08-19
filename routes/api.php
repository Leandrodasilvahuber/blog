<?php

declare(strict_types=1);

use App\Http\Controllers\Api\Admin\PostController as ApiAdminPostController;
use App\Http\Controllers\Api\PostController as ApiPostController;
use App\Http\Controllers\Api\VideoController as ApiVideoController;
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

Route::middleware('auth:sanctum')->get('/user', fn (Request $request) => $request->user());

Route::get('/posts', [ApiPostController::class, 'index'])->name('api.posts.index');
Route::get('/videos', [ApiVideoController::class, 'index'])->name('api.videos.index');

Route::middleware('auth:sanctum')->prefix('adm')->group(function () {
    Route::post('/posts', [ApiAdminPostController::class, 'store']);
    Route::delete('/posts/{post}', [ApiAdminPostController::class, 'destroy']);
});
