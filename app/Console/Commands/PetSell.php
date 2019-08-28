<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hexa\Shop\Application\UseCases\SellPet;

class PetSell extends Command
{
    protected $service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pets:sell';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sell pet';

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
    public function handle(SellPet $sellPet)
    {
        $customerId = $this->ask('Customer ID');
        $petId = $this->ask('Pet ID');
        $insuranceId = $this->ask('Insurance ID');
        $upfront = $this->choice('Upfront', ['yes', 'no']);

        try {
            $response = $sellPet($customerId, $petId, $insuranceId, $upfront);

            if ($response) {
                $this->info('Pet sold!');
            } else {
                $this->error('Something went wrong!');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
