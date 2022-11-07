<?php

namespace Tests\Feature\Api;

use App\Models\Car;
use App\Models\User;

use App\Models\Category;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarTest extends TestCase
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
    public function it_gets_cars_list()
    {
        $cars = Car::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.cars.index'));

        $response->assertOk()->assertSee($cars[0]->placa);
    }

    /**
     * @test
     */
    public function it_stores_the_car()
    {
        $data = Car::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.cars.store'), $data);

        $this->assertDatabaseHas('cars', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_car()
    {
        $car = Car::factory()->create();

        $category = Category::factory()->create();

        $data = [
            'placa' => $this->faker->text(255),
            'km' => $this->faker->randomNumber(0),
            'cor' => $this->faker->text(255),
            'marca' => $this->faker->text(255),
            'modelo' => $this->faker->text(255),
            'ano' => $this->faker->randomNumber(0),
            'category_id' => $category->id,
        ];

        $response = $this->putJson(route('api.cars.update', $car), $data);

        $data['id'] = $car->id;

        $this->assertDatabaseHas('cars', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_car()
    {
        $car = Car::factory()->create();

        $response = $this->deleteJson(route('api.cars.destroy', $car));

        $this->assertModelMissing($car);

        $response->assertNoContent();
    }
}
