<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hexa\Shop\Domain\Transformers\UserTransformer;
use Hexa\Shop\Application\UseCases\CustomerList as CL;

class CustomerList extends Command
{
    protected $transformer;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customers:pending-order-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show list of pets that should go to vet';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserTransformer $userTransformer)
    {
        parent::__construct();
        $this->transformer = $userTransformer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(CL $customerList)
    {
        $this->table(['id', 'name', 'email', 'phone'], $this->transformer->transformCollection($customerList())['data']);
    }
}
