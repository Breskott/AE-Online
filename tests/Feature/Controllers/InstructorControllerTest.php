<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Instructor;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstructorControllerTest extends TestCase
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
    public function it_displays_index_view_with_instructors()
    {
        $instructors = Instructor::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('instructors.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.instructors.index')
            ->assertViewHas('instructors');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_instructor()
    {
        $response = $this->get(route('instructors.create'));

        $response->assertOk()->assertViewIs('app.instructors.create');
    }

    /**
     * @test
     */
    public function it_stores_the_instructor()
    {
        $data = Instructor::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('instructors.store'), $data);

        $this->assertDatabaseHas('instructors', $data);

        $instructor = Instructor::latest('id')->first();

        $response->assertRedirect(route('instructors.edit', $instructor));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_instructor()
    {
        $instructor = Instructor::factory()->create();

        $response = $this->get(route('instructors.show', $instructor));

        $response
            ->assertOk()
            ->assertViewIs('app.instructors.show')
            ->assertViewHas('instructor');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_instructor()
    {
        $instructor = Instructor::factory()->create();

        $response = $this->get(route('instructors.edit', $instructor));

        $response
            ->assertOk()
            ->assertViewIs('app.instructors.edit')
            ->assertViewHas('instructor');
    }

    /**
     * @test
     */
    public function it_updates_the_instructor()
    {
        $instructor = Instructor::factory()->create();

        $data = [
            'nome' => $this->faker->text(255),
            'cpf' => $this->faker->cpf(false),
            'rg' => $this->faker->rg(false),
            'telefone' => $this->faker->text(255),
            'celular' => $this->faker->text(255),
            'credencial' => $this->faker->text(255),
            'email' => $this->faker->email,
        ];

        $response = $this->put(route('instructors.update', $instructor), $data);

        $data['id'] = $instructor->id;

        $this->assertDatabaseHas('instructors', $data);

        $response->assertRedirect(route('instructors.edit', $instructor));
    }

    /**
     * @test
     */
    public function it_deletes_the_instructor()
    {
        $instructor = Instructor::factory()->create();

        $response = $this->delete(route('instructors.destroy', $instructor));

        $response->assertRedirect(route('instructors.index'));

        $this->assertModelMissing($instructor);
    }
}
