<?php

namespace Tests\Feature\API\Product;

class SearchProductTest extends BaseProductTest
{
    public function testSearchItemTestProductByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $this->getJson($this->makeURI())
            ->assertStatus(404);
    }

    public function testSearchItemTestProductByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $item->save();

        $this->getJson($this->makeURI())
            ->assertStatus(404);
    }
}
