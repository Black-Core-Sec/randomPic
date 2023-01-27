<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);
Route::post('/approve', [\App\Http\Controllers\MainController::class, 'approve']);

Route::middleware('auth.admin.token')->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index']);
    Route::post('/discard-approval-status', [\App\Http\Controllers\AdminController::class, 'discardApprovalStatus']);
});
