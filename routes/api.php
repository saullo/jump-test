<?php

use App\Http\Controllers\ServiceOrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Retorna todos os itens da tabela 'service_orders'
Route::get('services', [ServiceOrderController::class, 'index']);

// Adiciona um item na tabela 'service_orders'
Route::post('services', [ServiceOrderController::class, 'store']);
