<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\SummaryController::class, 'showForm']);
Route::post('/summary', [App\Http\Controllers\SummaryController::class, 'summarize']);
