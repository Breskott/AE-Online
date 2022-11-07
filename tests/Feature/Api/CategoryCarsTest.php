<?php

namespace Tests\Feature\Api;

use App\Models\Car;
use App\Models\User;
use App\Models\Category;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryCarsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_category_cars()
    {
        $category = Category::factory()->create();
        $cars = Car::factory()
            ->count(2)
            ->create([
                'category_id' => $category->id,
            ]);

        $response = $this->getJson(
            route('api.categories.cars.index', $category)
        );

        $response->assertOk()->assertSee($cars[0]->placa);
    }

    /**
     * @test
     */
    public function it_stores_the_category_cars()
    {
        $category = Category::factory()->create();
        $data = Car::factory()
            ->make([
                'category_id' => $category->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.categories.cars.store', $category),
            $data
        );

        $this->assertDatabaseHas('cars', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $car = Car::latest('id')->first();

        $this->assertEquals($category->id, $car->category_id);
    }
}
