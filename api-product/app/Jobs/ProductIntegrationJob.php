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

        Redis::connection()->lpush('integration_queue', json_encode([
            'action' => 'sync_product',
            'product' => $this->product->toArray(),
        ]));


//        dispatch(new \App\Jobs\IntegrationQueueJob($this->product));
//        dispatch(new IntegrationQueueJob($this->product));

//        // Lógica para preparar dados e enviar para a fila no Microserviço de Integração
//        $integrationData = [
//            'action' => 'sync_product',
//            'product' => $this->product->toArray(),
//        ];
//
//        Redis::connection()->rpush('integration_queue', json_encode($this->product));
////        dispatch(job: new IntegrationQueueJob($integrationData));
    }
}
