<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AiQuote
{

    protected $aiApiUrl;
    protected $aiApiKey;

    public function __construct()
    {
        $this->aiApiUrl = getenv("OPEN_AI_API_URL");
        $this->aiApiKey = getenv("OPEN_AI_API_KEY");
    }

    public function generateQuote()
    {
        // try{

        // curl https://api.openai.com/v1/chat/completions \
        // -H "Content-Type: application/json" \
        // -H "Authorization: Bearer $this->AI_Api_Key" \
        // -d '{
        //     "model": "gpt-3.5-turbo",
        //     "messages": [{"role": "user", "content": "Say this is a test!"}],
        //     "temperature": 0.7
        // }'

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->aiApiKey,
            'Content-Type' => 'application/json',
            'model' => 'gpt-3.5-turbo',
        ])->post($this->aiApiUrl . '/completions', [
            'message' => json_encode(["role" => "user", "content" => "Say this is a test!"]),
        ]);

        return response()->json($response->body());
    }
}
