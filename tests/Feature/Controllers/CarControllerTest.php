<?php

namespace Tests\Feature\Controllers;

use App\Models\Car;
use App\Models\User;

use App\Models\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_cars()
    {
        $cars = Car::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('cars.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.cars.index')
            ->assertViewHas('cars');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_car()
    {
        $response = $this->get(route('cars.create'));

        $response->assertOk()->assertViewIs('app.cars.create');
    }

    /**
     * @test
     */
    public function it_stores_the_car()
    {
        $data = Car::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('cars.store'), $data);

        $this->assertDatabaseHas('cars', $data);

        $car = Car::latest('id')->first();

        $response->assertRedirect(route('cars.edit', $car));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_car()
    {
        $car = Car::factory()->create();

        $response = $this->get(route('cars.show', $car));

        $response
            ->assertOk()
            ->assertViewIs('app.cars.show')
            ->assertViewHas('car');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_car()
    {
        $car = Car::factory()->create();

        $response = $this->get(route('cars.edit', $car));

        $response
            ->assertOk()
            ->assertViewIs('app.cars.edit')
            ->assertViewHas('car');
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

        $response = $this->put(route('cars.update', $car), $data);

        $data['id'] = $car->id;

        $this->assertDatabaseHas('cars', $data);

        $response->assertRedirect(route('cars.edit', $car));
    }

    /**
     * @test
     */
    public function it_deletes_the_car()
    {
        $car = Car::factory()->create();

        $response = $this->delete(route('cars.destroy', $car));

        $response->assertRedirect(route('cars.index'));

        $this->assertModelMissing($car);
    }
}
