<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    protected $apiKey;
    public function __construct()
    {
        $this->apiKey = config('services.gemini.key');
    }
    public function summarize($content)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' . $this->apiKey, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => "Summarize the following text:\n" . $content]
                    ]
                ]
            ]
        ]);
        return $response->json('candidates.0.content.parts.0.text') ?? 'No summary returned.';
    }
}
