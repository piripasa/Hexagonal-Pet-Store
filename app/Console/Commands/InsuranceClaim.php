<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hexa\Shop\Application\UseCases\InsuranceClaim as IC;

class InsuranceClaim extends Command
{
    protected $service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insurance:claim';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Claim insurance';

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
    public function handle(IC $insuranceClaim)
    {
        $orderId = $this->ask('Order ID');

        try {
            if ($insuranceClaim($orderId)) {
                $this->info('Claimed!');
            } else {
                $this->error('Something went wrong!');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
