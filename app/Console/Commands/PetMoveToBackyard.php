<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hexa\Shop\Application\UseCases\MoveToBackyard;

class PetMoveToBackyard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pets:move-to-backyard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move pet to backyard from showroom';

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
    public function handle(MoveToBackyard $moveToBackyard)
    {
        $petId = $this->ask('Pet ID (keep blank for all)');

        try {
            $response = $moveToBackyard(array_filter([$petId]));

            $this->info($response . ' pets moved to backyard!');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
