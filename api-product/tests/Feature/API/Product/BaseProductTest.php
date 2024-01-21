<?php

namespace Tests\Feature\API\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\API\BaseTest;

abstract class BaseProductTest extends BaseTest
{
    use RefreshDatabase;

    protected function path(): string
    {
        return "product";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Product
     */
    protected function makeItem(User $user, array $attributes = [])
    {
        $item = Product::factory()
            ->for($user, 'user')
            ->make($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    protected function structure(): array
    {
        return Product::keys();
    }

}
