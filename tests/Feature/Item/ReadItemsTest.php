<?php

namespace Tests\Feature\Item;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;

class ReadItemsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_read_all_the_items(): void
    {
        $item = Item::factory()->create();
        $response = $this->getJson('/items');
        // $response->assertSee($item->name);
    }
}