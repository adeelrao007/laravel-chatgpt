<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summary;
use App\Services\OpenAIService;
use App\Services\ClaudeService;
use App\Services\GeminiService;
use App\Services\GrokService;

class SummaryController extends Controller
{

    public function showFormOpenAI()
    {
        return view('summary.form', [
            'service' => 'openai',
            'title' => 'Summarize Text with OpenAI',
            'action' => '/summary/openai',
        ]);
    }

    public function showFormClaude()
    {
        return view('summary.form', [
            'service' => 'claude',
            'title' => 'Summarize Text with Claude',
            'action' => '/summary/claude',
        ]);
    }

    public function showFormGemini()
    {
        return view('summary.form', [
            'service' => 'gemini',
            'title' => 'Summarize Text with Gemini',
            'action' => '/summary/gemini',
        ]);
    }

    public function showFormGrok()
    {
        return view('summary.form', [
            'service' => 'grok',
            'title' => 'Summarize Text with Grok',
            'action' => '/summary/grok',
        ]);
    }

    public function summarizeOpenAI(Request $request, OpenAIService $openAIService)
    {
        $request->validate([
            'user_content' => 'required|string',
        ]);
        $userContent = $request->input('user_content');
        $summary = $openAIService->summarize($userContent);
        Summary::create([
            'user_content' => $userContent,
            'summary_response' => $summary,
        ]);
        return view('summary.form', [
            'summary' => $summary,
            'user_content' => $userContent,
            'service' => 'openai',
            'title' => 'Summarize Text with OpenAI',
            'action' => '/summary/openai',
        ]);
    }

    public function summarizeClaude(Request $request, ClaudeService $claudeService)
    {
        $request->validate([
            'user_content' => 'required|string',
        ]);
        $userContent = $request->input('user_content');
        $summary = $claudeService->summarize($userContent);
        Summary::create([
            'user_content' => $userContent,
            'summary_response' => $summary,
        ]);
        return view('summary.form', [
            'summary' => $summary,
            'user_content' => $userContent,
            'service' => 'claude',
            'title' => 'Summarize Text with Claude',
            'action' => '/summary/claude',
        ]);
    }

    public function summarizeGemini(Request $request, GeminiService $geminiService)
    {
        $request->validate([
            'user_content' => 'required|string',
        ]);
        $userContent = $request->input('user_content');
        $summary = $geminiService->summarize($userContent);
        Summary::create([
            'user_content' => $userContent,
            'summary_response' => $summary,
        ]);
        return view('summary.form', [
            'summary' => $summary,
            'user_content' => $userContent,
            'service' => 'gemini',
            'title' => 'Summarize Text with Gemini',
            'action' => '/summary/gemini',
        ]);
    }

    public function summarizeGrok(Request $request, GrokService $grokService)
    {
        $request->validate([
            'user_content' => 'required|string',
        ]);
        $userContent = $request->input('user_content');
        $summary = $grokService->summarize($userContent);
        Summary::create([
            'user_content' => $userContent,
            'summary_response' => $summary,
        ]);
        return view('summary.form', [
            'summary' => $summary,
            'user_content' => $userContent,
            'service' => 'grok',
            'title' => 'Summarize Text with Grok',
            'action' => '/summary/grok',
        ]);
    }
}
