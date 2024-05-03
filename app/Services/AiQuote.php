<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AiQuote
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPEN_AI_API_KEY');
        $this->client = new Client();
    }

    public function generateMotivationalQuote()
    {
        $payload = [
            'model' => 'gpt-3.5-turbo', // Adjust model as necessary.
            'prompt' => 'Generate an inspirational quote.', // Define your prompt
            'temperature' => 0.7,
            'max_tokens' => 64,
        ];

        try {
            $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
            ]);

            $body = json_decode($response->getBody(), true);
            return $body['choices'][0]['message']['content'] ?? 'No quote could be generated.';
        } catch (GuzzleException $e) {
            return 'Failed to generate quote: ' . $e->getMessage();
        }
    }
}
