<?php

namespace Tests\Feature\API\Product;

class DeleteProductTest extends BaseProductTest
{
    public function testDeleteItemTestProductByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }

    public function testDeleteItemTestProductByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $item->save();

        $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}
