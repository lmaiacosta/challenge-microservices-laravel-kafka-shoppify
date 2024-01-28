<?php

namespace App\Observers;

use App\Jobs\ProductIntegrationJob;
use App\Models\Product;
use App\Events\ProductEventCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Support\Facades\Queue;

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
        dispatch(new ProductIntegrationJob($product));
    }

    /**
     * Handle the item "updated" event.
     *
     * @param  Product $product
     * @return void
     */
    public function updated(Product $product): void
    {
        dispatch(new ProductIntegrationJob($product));
//        event(new ProductUpdated($product));
    }

    /**
     * Handle the item "deleted" event.
     *
     * @param  Product $product
     * @return void
     */
    public function deleted(Product $product): void
    {
        dispatch(new ProductIntegrationJob($product));
//        event(new ProductDeleted($product));
    }
}
