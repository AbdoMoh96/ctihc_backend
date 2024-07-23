<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\Auth\AuthController;


Route::post('login', [AuthController::class,'generateToken']);

Route::middleware('auth:admin')->post('logout', [AuthController::class,'revokeToken']);
