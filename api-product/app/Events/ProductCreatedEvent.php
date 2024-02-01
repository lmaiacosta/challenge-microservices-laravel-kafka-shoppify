<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('product-updates');
    }
}
