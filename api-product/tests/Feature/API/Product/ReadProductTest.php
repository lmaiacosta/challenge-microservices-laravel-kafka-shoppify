<?php

namespace Tests\Feature\API\Product;

class ReadProductTest extends BaseProductTest
{
    public function testReadItemTestProductByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $this->getJson($this->makeURI($item->id))
            ->assertStatus(404);
    }

    public function testReadItemTestProductByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $item->save();

        $this->getJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}
