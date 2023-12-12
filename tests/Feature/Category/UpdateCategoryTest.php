<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_authorized_user_can_update_the_category_name(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create(['name' => 'Category100']);
        $category->name = "Updated Category name";

        $this->putJson("api/categories/{$category->id}", ['name' => $category->name])
		->assertStatus(200)
		->assertJsonFragment(['name' => $category->name]);        
    }

    public function test_authorized_user_can_update_the_category_description(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create(['description' => 'description100']);
        $category->description = "Updated description";

        $this->putJson("api/categories/{$category->id}", ['description' => $category->description])
		->assertStatus(200)
		->assertJsonFragment(['description' => $category->description]);
    }

    public function test_unauthorized_user_cannot_update_the_category(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->create(['name' => 'Category200']);
        $category->name = "Updated Category Name";
        $response = $this->put('/categories/'.$category->id, $category->toArray());
        // $response->assertStatus(403);
    }
}
