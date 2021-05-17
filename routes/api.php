<?php

use App\Http\Controllers\InvoicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/invoices', [InvoicesController::class, 'index'])->middleware('throttle:1000,1');

Route::get('/invoice/{id}', [InvoicesController::class, 'show'])->middleware('throttle:1000,1');

Route::post('/invoices', [InvoicesController::class, 'store'])->middleware('throttle:1000,1');