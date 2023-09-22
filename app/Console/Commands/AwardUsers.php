<?php

namespace App\Console\Commands;

use App\Models\Tickets;
use Illuminate\Console\Command;

class AwardUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:award-users';

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
        $tickets = Tickets::
    }
}
