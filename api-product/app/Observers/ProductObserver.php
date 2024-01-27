<?php

namespace App\Observers;

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
     * @param  Product $item
     * @return void
     */
    public function created(Product $item)
    {
//        ProductEventCreated::dispatch($item);
        Queue::push(function () use ($item) {
            event(new ProductEventCreated($item));
        });

    }

    /**
     * Handle the item "updated" event.
     *
     * @param  Product $item
     * @return void
     */
    public function updated(Product $item)
    {
        event(new ProductUpdated($item));
    }

    /**
     * Handle the item "deleted" event.
     *
     * @param  Product $item
     * @return void
     */
    public function deleted(Product $item)
    {
        event(new ProductDeleted($item));
    }
}
