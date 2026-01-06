<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('home');
});
Route::get('/summary/openai', [App\Http\Controllers\SummaryController::class, 'showForm']);
Route::post('/summary/openai', [App\Http\Controllers\SummaryController::class, 'summarizeOpenAI']);
Route::get('/summary/claude', [App\Http\Controllers\SummaryController::class, 'showFormClaude']);
Route::post('/summary/claude', [App\Http\Controllers\SummaryController::class, 'summarizeClaude']);
Route::get('/summary/gemini', [App\Http\Controllers\SummaryController::class, 'showFormGemini']);
Route::post('/summary/gemini', [App\Http\Controllers\SummaryController::class, 'summarizeGemini']);
Route::get('/summary/grok', [App\Http\Controllers\SummaryController::class, 'showFormGrok']);
Route::post('/summary/grok', [App\Http\Controllers\SummaryController::class, 'summarizeGrok']);
