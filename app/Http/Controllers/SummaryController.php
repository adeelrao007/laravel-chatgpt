<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summary;
use App\Services\OpenAIService;

class SummaryController extends Controller
{
    public function showForm()
    {
        return view('summary.form');
    }

    public function summarize(Request $request, OpenAIService $openAIService)
    {
        $request->validate([
            'user_content' => 'required|string',
        ]);

        $userContent = $request->input('user_content');
        $summary = $openAIService->summarize($userContent);

        $record = Summary::create([
            'user_content' => $userContent,
            'summary_response' => $summary,
        ]);

        return view('summary.form', [
            'summary' => $summary,
            'user_content' => $userContent,
        ]);
    }
}
