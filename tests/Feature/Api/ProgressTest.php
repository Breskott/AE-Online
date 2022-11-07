<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Progress;

use App\Models\Car;
use App\Models\Student;
use App\Models\Instructor;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgressTest extends TestCase
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
    public function it_gets_progresses_list()
    {
        $progresses = Progress::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.progresses.index'));

        $response->assertOk()->assertSee($progresses[0]->abastecimento);
    }

    /**
     * @test
     */
    public function it_stores_the_progress()
    {
        $data = Progress::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.progresses.store'), $data);

        $this->assertDatabaseHas('progress', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_progress()
    {
        $progress = Progress::factory()->create();

        $car = Car::factory()->create();
        $instructor = Instructor::factory()->create();
        $student = Student::factory()->create();

        $data = [
            'abastecimento' => $this->faker->text(255),
            'valor' => $this->faker->randomNumber(2),
            'hora_ini' => $this->faker->text(255),
            'hora_fim' => $this->faker->text(255),
            'car_id' => $car->id,
            'instructor_id' => $instructor->id,
            'student_id' => $student->id,
        ];

        $response = $this->putJson(
            route('api.progresses.update', $progress),
            $data
        );

        $data['id'] = $progress->id;

        $this->assertDatabaseHas('progress', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_progress()
    {
        $progress = Progress::factory()->create();

        $response = $this->deleteJson(
            route('api.progresses.destroy', $progress)
        );

        $this->assertModelMissing($progress);

        $response->assertNoContent();
    }
}
