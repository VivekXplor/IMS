<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class ReadCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_authorized_user_can_read_the_category(): void
    {
        $category = Category::factory()->create();
        $response = $this->getJson('/items/'.$category->id);
        // $response->assertStatus(200);
    }
}
