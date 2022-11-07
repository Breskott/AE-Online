<?php

namespace Tests\Feature\Api;

use App\Models\Car;
use App\Models\User;
use App\Models\Progress;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarProgressesTest extends TestCase
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
    public function it_gets_car_progresses()
    {
        $car = Car::factory()->create();
        $progresses = Progress::factory()
            ->count(2)
            ->create([
                'car_id' => $car->id,
            ]);

        $response = $this->getJson(route('api.cars.progresses.index', $car));

        $response->assertOk()->assertSee($progresses[0]->abastecimento);
    }

    /**
     * @test
     */
    public function it_stores_the_car_progresses()
    {
        $car = Car::factory()->create();
        $data = Progress::factory()
            ->make([
                'car_id' => $car->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.cars.progresses.store', $car),
            $data
        );

        $this->assertDatabaseHas('progress', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $progress = Progress::latest('id')->first();

        $this->assertEquals($car->id, $progress->car_id);
    }
}
