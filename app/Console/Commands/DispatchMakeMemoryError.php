<?php

namespace App\Console\Commands;

use App\Jobs\MakeMemoryError;
use Illuminate\Console\Command;

class DispatchMakeMemoryError extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispatch-make-memory-error';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        MakeMemoryError::dispatch();
    }
}
