<?php

namespace App\Console\Commands;

use Hexa\Shop\Application\UseCases\MoveToShowroom;
use Illuminate\Console\Command;

class PetMoveToShowroom extends Command
{
    protected $service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pets:move-to-showroom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move pet to showroom from backyard';

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
    public function handle(MoveToShowroom $moveToShowroom)
    {
        $petId = $this->ask('Pet IDs (comma seperated)');

        try {
            $response = $moveToShowroom(array_filter(explode(',', $petId)));

            $this->info($response . ' pets moved to showroom!');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
