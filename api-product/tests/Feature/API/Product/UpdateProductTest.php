<?php

namespace Tests\Feature\API\Product;

class UpdateProductTest extends BaseProductTest
{
    public function testUpdateItemTestProductByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $this->patchJson($this->makeURI($item->id), $item->toArray())
            ->assertStatus(404);
    }

    public function testUpdateItemTestProductByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $item->save();

        $this->patchJson($this->makeURI($item->id), $item->toArray())
            ->assertStatus(404);
    }
}
