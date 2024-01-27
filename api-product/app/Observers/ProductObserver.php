<?php

namespace App\Observers;

use App\Models\Product;
use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;

class ProductObserver
{
    /**
     * Handle the item "created" event.
     *
     * @param  Product $item
     * @return void
     */
    public function created(Product $item)
    {
        event(new ProductCreated($item));
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
