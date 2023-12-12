<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class ReadCategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_read_all_the_categories(): void
    {
        $category = Category::factory()->create();
        $response = $this->getJson('/categories');
        // $response->assertSee($category->name);
    }
}
