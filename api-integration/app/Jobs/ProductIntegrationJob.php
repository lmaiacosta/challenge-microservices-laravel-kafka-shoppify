<?php

namespace App\Jobs;

use App\Http\Controllers\ShopifyController;
use App\Models\ShopifyProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProductIntegrationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * @throws \Exception
     */
    public function handle(): void
    {
        $product = $this->product;
        $id_shopify = ShopifyProduct::whereIdProduct($product['id'])->value("id_shopify");
        if ($id_shopify > 0) {
            $product['id_shopify'] = $id_shopify;
            Log::info('Found on database updating on shopify', $product);
            $response = ShopifyController::updateProductShopify($product);
        } else {
            Log::info('Not Found on database is a insert on shopify', $product);
            $response = ShopifyController::createProductShopify($product);
        }
        Log::info('Return from shopify statusCode: '.$response['statusCode'], $response);
        if ($response['statusCode'] !== "400") {
            $arrayCreate = [
                'id_product' => $product['id'],
                'id_shopify' => $response['body']['product']['id'],
                'all' => json_encode($response['body']['product'])
            ];
            log::info('Array a ser inserido produto:'.$product['id'], $arrayCreate);
            $insertStatus = ShopifyProduct::create($arrayCreate);
            log::info($insertStatus);
        }

        // Replace the following line with your actual processing logic.
        // Example: You might perform some computation or send the data to another system.
        // Simulate a delay for demonstration purposes (adjust as needed).
        // Once the job is processed, it will be removed from the queue.
    }
}

