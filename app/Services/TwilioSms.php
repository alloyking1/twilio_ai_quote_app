<?php

namespace App\Services;

use App\Models\Subscribe;
use Twilio\Rest\Client;

class TwilioSms
{
    protected $twilioSid;
    protected $twilioAuthToken;
    protected $twilioPhoneNumber;
    protected $twilio;

    public function __construct()
    {
        $this->twilioSid = env("TWILIO_ACCOUNT_SID");
        $this->twilioAuthToken = env("TWILIO_AUTH_TOKEN");
        $this->twilioPhoneNumber = env("TWILIO_PHONE_NUMBER");
        $this->twilio =  new Client($this->twilioSid, $this->twilioAuthToken);
    }

    public function sendSms($aiGeneratedQuote)
    {
        try {
            $users = Subscribe::all();
            foreach ($users as $user) {
                $message = $this->twilio->messages
                    ->create(
                        '+' . $user->phone, // to
                        [
                            "body" => $aiGeneratedQuote,
                            "from" => $this->twilioPhoneNumber //twilio num
                        ]
                    );
            }

            print($validation_request->friendlyName);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
