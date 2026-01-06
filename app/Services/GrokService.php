<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GrokService
{
    protected $apiKey;
    public function __construct()
    {
        $this->apiKey = config('services.grok.key');
    }
    public function summarize($content)
    {
        // NOTE: Replace the endpoint and parameters with the real Grok API when available
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.grok.x.ai/v1/summarize', [
            'prompt' => "Summarize the following text:\n" . $content,
            'max_tokens' => 150,
        ]);
        return $response->json('summary') ?? 'No summary returned.';
    }
}
