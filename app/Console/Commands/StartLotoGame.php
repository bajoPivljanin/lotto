<?php

namespace App\Console\Commands;

use App\Models\LottoGames;
use App\Models\Settings;
use App\Models\Tickets;
use Illuminate\Console\Command;

class StartLotoGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:start';
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
        $lotoNumbers = [];
        while(count($lotoNumbers)<7)
        {
            $randomNumber = rand(0,100);
            if (in_array($randomNumber,$lotoNumbers)){
                continue;
            }
            $lotoNumbers[] = $randomNumber;
        }

        $award = Tickets::getForPast7Days();
        $houseCut = $award * env('HOUSE_CUT');
        $award = $award - $houseCut;

        LottoGames::create([
            'numbers' => implode(',',$lotoNumbers),
            'award_fund' => $award
        ]);

        $settingsBank = Settings::where(['key' => 'bank'])->first();
        $settingsBank->value += $houseCut;
        $settingsBank->save();

        $this->output->info("Numbers that were picked: ".implode(',',$lotoNumbers));
        $this->output->info("Award winning fund was $award and house kept $houseCut");

    }
}
