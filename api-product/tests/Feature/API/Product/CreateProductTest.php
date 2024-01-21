<?php

namespace Tests\Feature\API\Product;

class CreateProductTest extends BaseProductTest
{
    public function testCreateItemTestProductByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $this->postJson($this->makeURI(), $item->toArray())
            ->assertStatus(404);
    }

    public function testCreateItemTestProductByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $this->postJson($this->makeURI(), $item->toArray())
            ->assertStatus(404);
    }
}
