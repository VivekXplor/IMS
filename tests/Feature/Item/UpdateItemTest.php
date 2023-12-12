<?php

namespace Tests\Feature\Item;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;

class UpdateItemTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authorized_user_can_update_the_item(){

        $user = User::factory()->create();
        $this->actingAs($user);
        $item = Item::factory()->create(['name' => 'vivek']);
        $item->name = "Updated name";

        $this->putJson("api/items/{$item->id}", ['name' => $item->name])
		->assertStatus(200)
		->assertJsonFragment(['name' => $item->name]);        
    }
}
