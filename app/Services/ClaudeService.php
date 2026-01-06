<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ClaudeService
{
    protected $apiKey;
    public function __construct()
    {
        $this->apiKey = config('services.claude.key');
    }
    public function summarize($content)
    {
        $response = Http::withHeaders([
            'x-api-key' => $this->apiKey,
            'anthropic-version' => '2023-06-01',
            'Content-Type' => 'application/json',
        ])->post('https://api.anthropic.com/v1/messages', [
            'model' => 'claude-2.1',
            'max_tokens' => 150,
            'messages' => [
                [
                    'role' => 'user',
                    'content' => "Summarize the following text:\n" . $content
                ]
            ]
        ]);
        return $response->json('content.0.text') ?? 'No summary returned.';
    }
}
