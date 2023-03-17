<?php

namespace App\Console\Commands;

use App\Models\GeneralAccount;
use Carbon\Carbon;
use Illuminate\Console\Command;


class CreateGeneralAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:general-account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create general account';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $generalAccount = new GeneralAccount();
        $generalAccount->day = Carbon::now('America/Bogota');
        $generalAccount->daily_expenses = 0;
        $generalAccount->product_expenses = 0;
        $generalAccount->total_sales = 0;
        $generalAccount->total_expenses = 0;
        $generalAccount->total_broken = 0;
        $generalAccount->total_earnings = 0;
        $generalAccount->total_balance = 0;
        $generalAccount->save();
    }
}
