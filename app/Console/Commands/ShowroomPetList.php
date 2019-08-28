<?php

namespace App\Console\Commands;

use Hexa\Shop\Application\UseCases\ShowroomPetList as SH;
use Hexa\Shop\Domain\Transformers\PetTransformer;
use Illuminate\Console\Command;

class ShowroomPetList extends Command
{
    protected $transformer;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pets:showroom-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show list of pets that should be in the showroom';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PetTransformer $petTransformer)
    {
        parent::__construct();
        $this->transformer = $petTransformer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(SH $showroomPetList)
    {
        $this->table(['id', 'name', 'Date of birth', 'chip', 'chip implanted date', 'price', 'status', 'description', 'category', 'public'], $this->transformer->transformCollection($showroomPetList())['data']);
    }
}
