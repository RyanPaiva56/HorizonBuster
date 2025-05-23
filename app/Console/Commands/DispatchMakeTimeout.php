<?php

namespace App\Console\Commands;

use App\Jobs\MakeTimeout;
use Illuminate\Console\Command;

class DispatchMakeTimeout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispatch-make-timeout';

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
        MakeTimeout::dispatch();
    }
}
