<?php

// App\Events\ProductEventCreated.php

namespace App\Events;

use App\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductEventCreated
{
    use Dispatchable, SerializesModels;

    public Product $item;

    public function __construct(Product $item)
    {
        $this->item = $item;
    }
}
