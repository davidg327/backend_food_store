<?php

namespace App\Console\Commands;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:account';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create sale day';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $account = new Account();
        $account->day = Carbon::now('America/Bogota');
        $account->save();
    }
}
