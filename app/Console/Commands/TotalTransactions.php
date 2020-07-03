<?php

namespace App\Console\Commands;

use App\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TotalTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:total';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show Total Daily Transactions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Transaction $tr)
    {
        echo Transaction::whereBetween('created_at',[Carbon::today(),Carbon::tomorrow()])->sum('money');
    }
}
