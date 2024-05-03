<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AiQuote;
use App\Services\TwilioSms;

class SendAiQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-ai-quote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates quotes from AI and send to all registered users';

    /**
     * Execute the console command.
     */
    public function handle(AiQuote $AiQuote, TwilioSms $twilioSms)
    {
        $generatedMotivationalQuote = $AiQuote->generateMotivationalQuote();
        // $sendQuoteSms = $twilioSms->sendSms($generatedMotivationalQuote);
        dump($generatedMotivationalQuote);
    }
}
