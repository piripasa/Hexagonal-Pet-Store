<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hexa\Shop\Application\UseCases\StorePet;

class PetCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pets:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert new pet';

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
    public function handle(StorePet $storePet)
    {
        $catArray = [1 => 'Cat', 2 => 'Dog', 3 => 'Bird'];
        $category = $this->choice(
            'Select pet type',
            $catArray
        );

        $name = $this->ask('Name');
        $dob = $this->ask('Date of birth(Y-m-d)');
        $price = $this->ask('Price');
        $description = $this->ask('Description');

        $catArray = array_flip($catArray);
        $data = [
            'name' => $name,
            'dob' => $dob,
            'price' => $price,
            'description' => $description,
            'category_id' => $catArray[$category]
        ];

        try {

            if ($storePet($data)) {
                $this->info('Pet stored!');
            } else {
                $this->error('Something went wrong!');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
