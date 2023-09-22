<?php

namespace App\Console\Commands;

use App\Models\LottoGames;
use App\Models\Tickets;
use Illuminate\Console\Command;

class AwardUsers extends Command
{
    const AWARD_MAP = [
        3 =>0.025,
        4 =>0.075,
        5 =>0.1,
        6 =>0.3,
        7 =>0.5
    ];
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
        $winners = [];
        $tickets = Tickets::getAllTicketsForPast7Day();
        $awardedNumbers = LottoGames::orderByDesc('id')->first()->numbers;
        $awardedNumbers = explode(',',$awardedNumbers);

        foreach ($tickets as $ticket)
        {
          $userNumbers = explode(',',$ticket->numbers);
          $intersect = array_intersect($awardedNumbers,$userNumbers);
          $numbersGuessed = count($intersect);

          if ($numbersGuessed >= 3)
          {
              $winners[$numbersGuessed][]= $ticket->user_id;
          }
        }
        dd($winners);
        //2.00.23
    }
}
