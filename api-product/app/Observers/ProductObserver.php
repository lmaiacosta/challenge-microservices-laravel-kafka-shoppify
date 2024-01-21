<?php

namespace App\Observers;

use App\Models\Product;

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
        //
    }

    /**
     * Handle the item "updated" event.
     *
     * @param  Product $item
     * @return void
     */
    public function updated(Product $item)
    {
        //
    }

    /**
     * Handle the item "deleted" event.
     *
     * @param  Product $item
     * @return void
     */
    public function deleted(Product $item)
    {
        //
    }

    /**
     * Handle the item "restored" event.
     *
     * @param  Product $item
     * @return void
     */
    public function restored(Product $item)
    {
        //
    }

    /**
     * Handle the item "force deleted" event.
     *
     * @param  Product $item
     * @return void
     */
    public function forceDeleted(Product $item)
    {
        //
    }
}
