<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hexa\Shop\Application\UseCases\ImplantChip;

class PetImplantChip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pets:chip-implant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attach Chip';

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
    public function handle(ImplantChip $implantChip)
    {
        $petId = $this->ask('Pet ID');
        $chip = $this->ask('Chip');
        $chipDate = $this->ask('Date(Y-m-d)');

        try {
            if ($implantChip($petId, $chip, $chipDate)) {
                $this->info('Chip implanted!');
            } else {
                $this->error('Something went wrong!');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
