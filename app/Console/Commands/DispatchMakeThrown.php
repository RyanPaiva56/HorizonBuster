<?php

namespace App\Console\Commands;

use App\Jobs\MakeThrown;
use Illuminate\Console\Command;

class DispatchMakeThrown extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispatch-make-thrown';

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
        MakeThrown::dispatch();
    }
}
