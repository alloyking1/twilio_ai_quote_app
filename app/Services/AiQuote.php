<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AiQuote
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPEN_AI_API_KEY');
        $this->url = env('OPEN_AI_API_URL');
        $this->client = new Client();
    }

    public function generateMotivationalQuote()
    {
        $payload = [
            'model' => 'gpt-3.5-turbo', // Adjust model as necessary.
            'messages' => [
                [
                  "role" => "system",
                  "content" => "You are a motivational quote assistant, skilled in generating motivational quotes to bright up peoples day" //replace with your prompt
                ],
                [
                  "role" => "user",
                  "content" => "Generate a motivational quote to brighten peoples day" //replace with your prompt
                  ]
              ]
        ];

        try {
            $response = $this->client->post($this->url.'completions', [
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
