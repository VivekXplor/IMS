<?php

namespace Tests\Feature\Item;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;

class DeleteItemTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_delete_the_item(): void
    {
        $item = Item::factory()->create();
        $this->delete('/items/'.$item->id);
        // $this->assertDatabaseMissing('items',['id'=> $item->id]);
    }
}