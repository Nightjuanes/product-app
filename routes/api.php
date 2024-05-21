<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\v1\ProductController;
use App\Http\Controllers\Api\v1\OrderController;
use App\Http\Controllers\Api\v1\ClientController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route :: prefix('v1')->group(function() { 
    Route :: get('/product/all', [ProductController::class, 'index']);
    Route :: post('/product', [ProductController::class, 'store']);
    Route :: get('/product', [ProductController::class, 'show']);
    Route :: patch('/product/{id}', [ProductController::class, 'update']);
    Route :: delete('{id}', [ProductController::class, 'destroy']);

    Route :: get('/order/all', [OrderController::class, 'index']);
    Route :: post('/order/enviar', [OrderController::class, 'store']);
    Route :: get('/order', [OrderController::class, 'show']);
    Route :: patch('/order/{id}', [OrderController::class, 'update']);
    Route :: delete('/order/{id}', [OrderController::class, 'destroy']);
    Route :: put('/order/{id}', [OrderController::class, 'updateStatus']);
    Route :: get('order/aprobados', [OrderController::class, 'aproved']);
    Route :: get('order/pendientes', [OrderController::class, 'pending']);

    Route :: get('  ', [ClientController::class, 'index']);
    Route :: post('/client', [ClientController::class, 'store']);
    Route :: get('/client', [ClientController::class, 'show']);
    Route :: patch('/client/{id}', [ClientController::class, 'update']);
    Route :: delete('/client/{id}', [ClientController::class, 'destroy']);
});





