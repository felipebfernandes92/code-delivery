<?php

namespace CodeDelivery\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TurnOffSensors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'turnoff:sensors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando irá desativar os sensores que não estão em uso.';

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
    public function handle()
    {
        $timeUpdate = new \DateTime(date('Y-m-d H:i:s'));
        $timeUpdate->modify('-10 minutes');

        DB::table('sensors')
            ->where('updated_at', '<', $timeUpdate)
            ->update(['status' => 0, 'updated_at' => \Carbon\Carbon::now()]);
    }
}
