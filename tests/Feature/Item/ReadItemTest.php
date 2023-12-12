<?php

namespace Tests\Feature\Item;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;

class ReadItemTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_authorized_user_can_read_the_item(): void
    {
        $item = Item::factory()->create();
        $response = $this->getJson('/items/'.$item->id);
        // $response->assertStatus(200);
    }
}
