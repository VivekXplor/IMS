<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_delete_the_category(): void
    {
        $category = Category::factory()->create();
        $this->delete('/categories/'.$category->id);
        // $this->assertDatabaseMissing('categories',['id'=> $category->id]);
    }
}
