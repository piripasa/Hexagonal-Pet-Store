<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Hexa\Shop\Application\UseCases\DeliverPendingOrder;

class DeliverOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:deliver';

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
    public function handle(DeliverPendingOrder $deliverPendingOrder)
    {
        $orderId = $this->ask('Order ID');

        try {
            $response = $deliverPendingOrder($orderId);

            if ($response) {
                $this->info('Order delivered!');
            } else {
                $this->error('Something went wrong!');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
