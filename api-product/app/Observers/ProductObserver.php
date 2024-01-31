<?php

namespace App\Observers;

use App\Jobs\ProductIntegrationJob;
use App\Models\Product;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
// use Illuminate\Support\Facades\Queue;

class ProductObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the item "created" event.
     *
     * @param  Product $product
     * @return void
     */
    public function created(Product $product): void
    {
        $dataToSend = $product->toArray();
        ProductIntegrationJob::dispatch($dataToSend)->onQueue('integration_queue');
    }
    /**
     * Handle the item "updated" event.
     *
     * @param  Product $product
     * @return void
     */
    public function updated(Product $product): void
    {
        $dataToSend = $product->toArray();
        ProductIntegrationJob::dispatch($dataToSend)->onQueue('integration_queue');

    }

    /**
     * Handle the item "deleted" event.
     *
     * @param  Product $product
     * @return void
     */
    public function deleted(Product $product): void
    {
        $dataToSend = $product->toArray();
        ProductIntegrationJob::dispatch($dataToSend)->onQueue('integration_queue');
    }
}
