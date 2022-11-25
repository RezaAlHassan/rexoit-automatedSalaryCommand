<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Wallet;


class sendSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rexoit:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send all users their salary';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $wallet_datas = Wallet::all();
 
        foreach ($wallet_datas as $wallet_data) {
            $cash=$wallet_data->cash_amount;
            $salary=$wallet_data->salary_amount;
            $updated=$cash+$salary;
            $wallet_data->cash_amount=$updated;
            $wallet_data->update();
        }
        
    }
}
