<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;


//Route::apiResource('v1/events', EventController::class);

Route::get('v1/events', [EventController::class, 'index']);

Route::get('v1/event/{id}', [EventController::class, 'show']);

Route::put('v1/event/{id}', [EventController::class, 'update']);

Route::post('v1/event', [EventController::class, 'store']);


Route::apiResource('v1/client', ClientController::class);

//Route::apiResource('v1/purchase', PurchaseController::class);

Route::post('v1/purchase', [PurchaseController::class, 'store']);

//Route::get('v1/purchase', [PurchaseController::class, 'index']);

Route::get('v1/orders/{id}', [PurchaseController::class, 'show']);