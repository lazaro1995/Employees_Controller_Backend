<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TimeCardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers', 'middleware'=>'auth:sanctum'], function(){
    Route::get('logout', [AuthController::class, 'logout']);
    Route::apiResource('employees', EmployeeController::class);
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('timecards', TimeCardController::class);
});

