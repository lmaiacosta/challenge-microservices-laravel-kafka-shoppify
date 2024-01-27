<?php

// App\Events\ProductCreated.php

namespace App\Events;

use App\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductCreated
{
    use Dispatchable, SerializesModels;

    public Product $item;

    public function __construct(Product $item)
    {
        $this->item = $item;
    }
}