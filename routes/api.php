<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks', TodoListController::class);
