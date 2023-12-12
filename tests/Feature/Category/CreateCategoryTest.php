<?php

namespace Tests\Feature\Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_authenticated_users_can_create_a_new_category(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->make();
        $response = $this->post('/api/categories',$category->toArray());
        $this->assertEquals(201, $response->getStatusCode());
    }


    public function test_category_requires_a_name(): void{
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->make(['name' => null]);
        $this->post('/api/categories',$category->toArray())
                ->assertSessionHasErrors('name');
    }
    
    public function test_category_requires_a_description(): void{
        $user = User::factory()->create();
        $this->actingAs($user);
        $category = Category::factory()->make(['description' => null]);    
        $this->post('/api/categories',$category->toArray())
            ->assertSessionHasErrors('description');
    }
}