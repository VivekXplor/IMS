<?php

namespace Tests;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Item;

class CreateItemTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_authenticated_users_can_create_a_new_item()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make();
        $response = $this->post('/api/items',$item->toArray());
        $this->assertEquals(201, $response->getStatusCode());
        // $this->assertDatabaseHas('items', [
        //     'id' => $this->item->id
        // ]);

    }


    public function item_requires_a_name(){

        //Given we have an authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make(['name' => null]);
        $this->post('/api/items',$item->toArray())
                ->assertSessionHasErrors('name');
    }
    
    public function test_item_requires_a_description(){
    
        //Given we have an authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make(['description' => null]);    
        $this->post('/api/items',$item->toArray())
            ->assertSessionHasErrors('description');
    }    
}
