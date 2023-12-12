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
    public function test_authenticated_users_can_create_a_new_item(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make();
        $response = $this->post('/api/items',$item->toArray());
        $this->assertEquals(201, $response->getStatusCode());
    }


    public function test_item_requires_a_name(): void{
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make(['name' => null]);
        $this->post('/api/items',$item->toArray())
                ->assertSessionHasErrors('name');
    }
    
    public function test_item_requires_a_description(): void{
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make(['description' => null]);    
        $this->post('/api/items',$item->toArray())
            ->assertSessionHasErrors('description');
    }

    public function test_item_requires_a_price(): void{
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make(['price' => null]);    
        $this->post('/api/items',$item->toArray())
            ->assertSessionHasErrors('price');
    }

    public function test_item_requires_a_quantity(): void{
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->make(['quantity' => null]);    
        $this->post('/api/items',$item->toArray())
            ->assertSessionHasErrors('quantity');
    }
}
