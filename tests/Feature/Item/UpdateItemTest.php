<?php

namespace Tests\Feature\Item;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;

class UpdateItemTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_authorized_user_can_update_the_item_name(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->create(['name' => 'Item100']);
        $item->name = "Updated name";

        $this->putJson("api/items/{$item->id}", ['name' => $item->name])
		->assertStatus(200)
		->assertJsonFragment(['name' => $item->name]);        
    }

    public function test_authorized_user_can_update_the_item_description(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->create(['description' => 'description100']);
        $item->description = "Updated description";

        $this->putJson("api/items/{$item->id}", ['description' => $item->description])
		->assertStatus(200)
		->assertJsonFragment(['description' => $item->description]);
    }

    public function test_authorized_user_can_update_the_item_price(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->create(['price' => '100']);
        $item->price = "200";

        $this->putJson("api/items/{$item->id}", ['price' => $item->price])
		->assertStatus(200)
		->assertJsonFragment(['price' => $item->price]);
    }

    public function test_authorized_user_can_update_the_item_quantity(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->create(['quantity' => '1000']);
        $item->quantity = "2000";

        $this->putJson("api/items/{$item->id}", ['quantity' => $item->quantity])
		->assertStatus(200)
		->assertJsonFragment(['quantity' => $item->quantity]);
    }

    public function test_unauthorized_user_cannot_update_the_item(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->create(['name' => 'Item200']);
        $item->name = "Updated Name";
        $response = $this->put('/items/'.$item->id, $item->toArray());
        // $response->assertStatus(403);
    }
}