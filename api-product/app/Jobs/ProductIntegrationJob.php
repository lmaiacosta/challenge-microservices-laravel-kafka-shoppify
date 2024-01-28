<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class ProductIntegrationJob implements ShouldQueue
{
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function handle()
    {
        Redis::connection()->rpush('integration_queue', json_encode([
            'action' => 'sync_product',
            'product' => $this->product->toArray(),
        ]));
    }
}
