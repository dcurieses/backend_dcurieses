<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SimulationController;


Route::get('/users',[UserController::class, 'get']); //Get all users
Route::get('/users/{dni}',[UserController::class, 'getbydni']); //Get user by dni
Route::post('/users',[UserController::class, 'store']); //Add user
Route::delete('/users/{dni}',[UserController::class, 'delete']); //Delete user by dni
Route::put('/users/{dni}',[UserController::class, 'update']); //Edit user by dni
Route::post('/users/{dni}/simulation',[SimulationController::class, 'store']); //Add simulation
