<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OpenAiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'openai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(\OpenAI\Client $client)
    {
        $result = $client->completions()->create([
            'prompt' => 'Write a poem about my hate for the programming language, python.',
            'model' => 'text-davinci-002',
            'max_tokens' => 250,
        ]);

        $this->line(ltrim($result->choices[0]->text));

        return Command::SUCCESS;
    }
}
