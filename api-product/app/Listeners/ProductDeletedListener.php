<?php

namespace App\Listeners;

use App\Events\ProductDeletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductDeletedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductDeletedEvent $event
     * @return void
     */
    public function handle(ProductDeletedEvent $event)
    {
        //
    }
}
