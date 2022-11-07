<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Progress;

use App\Models\Car;
use App\Models\Student;
use App\Models\Instructor;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProgressControllerTest extends TestCase
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
    public function it_displays_index_view_with_progresses()
    {
        $progresses = Progress::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('progresses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.progresses.index')
            ->assertViewHas('progresses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_progress()
    {
        $response = $this->get(route('progresses.create'));

        $response->assertOk()->assertViewIs('app.progresses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_progress()
    {
        $data = Progress::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('progresses.store'), $data);

        $this->assertDatabaseHas('progress', $data);

        $progress = Progress::latest('id')->first();

        $response->assertRedirect(route('progresses.edit', $progress));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_progress()
    {
        $progress = Progress::factory()->create();

        $response = $this->get(route('progresses.show', $progress));

        $response
            ->assertOk()
            ->assertViewIs('app.progresses.show')
            ->assertViewHas('progress');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_progress()
    {
        $progress = Progress::factory()->create();

        $response = $this->get(route('progresses.edit', $progress));

        $response
            ->assertOk()
            ->assertViewIs('app.progresses.edit')
            ->assertViewHas('progress');
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

        $response = $this->put(route('progresses.update', $progress), $data);

        $data['id'] = $progress->id;

        $this->assertDatabaseHas('progress', $data);

        $response->assertRedirect(route('progresses.edit', $progress));
    }

    /**
     * @test
     */
    public function it_deletes_the_progress()
    {
        $progress = Progress::factory()->create();

        $response = $this->delete(route('progresses.destroy', $progress));

        $response->assertRedirect(route('progresses.index'));

        $this->assertModelMissing($progress);
    }
}
