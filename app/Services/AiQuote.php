<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AiQuote
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPEN_AI_API_KEY');
        $this->client = new Client([
            'base_uri' => env('OPEN_AI_API_URL'),
        ]);
    }

    public function generateMotivationalQuote()
    {
        // $response = $this->client->request('POST', '/v1/engines/text-davinci-003/completions', [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . $this->apiKey,
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => [
        //         'prompt' => 'Provide a motivational quote.',
        //         'temperature' => 0.7,
        //         'max_tokens' => 64,
        //     ],
        // ]);

        // $body = $response->getBody();
        // $data = json_decode($body);

        // return $data->choices[0]->text ?? 'No quote generated.';

        return "this is the motivational text sample";
    }
}
