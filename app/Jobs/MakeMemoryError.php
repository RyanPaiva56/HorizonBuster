<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class MakeMemoryError implements ShouldQueue
{
    use Queueable;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 3600;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * Indicate if the job should be marked as failed on timeout.
     *
     * @var bool
     */
    public $failOnTimeout = true;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $count = 10000;
        $bigText = $this->oneMegabyteOfText();
        for ($i = 0; $i < $count; $i++) {
            $user = new User;
            $user->name = 'User '.$i;
            $user->email = 'user'.$i.'@example.com';
            $user->password = bcrypt('password');
            $user->saveQuietly();
            $user->big_text = $bigText;
            $user->save();
            if ($i % 10 === 0) {
                logger()->info('Inserted '.$i.' users.');
                logger()->info('Memory usage: '.number_format(memory_get_usage(true) / 1048576, 2).' MB.');
            }
        }
    }

    public function oneMegabyteOfText(): string
    {
        return str_repeat('a', 1024 * 1024);
    }
}
