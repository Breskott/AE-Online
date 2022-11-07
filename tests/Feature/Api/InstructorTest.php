<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Instructor;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstructorTest extends TestCase
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
    public function it_gets_instructors_list()
    {
        $instructors = Instructor::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.instructors.index'));

        $response->assertOk()->assertSee($instructors[0]->nome);
    }

    /**
     * @test
     */
    public function it_stores_the_instructor()
    {
        $data = Instructor::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.instructors.store'), $data);

        $this->assertDatabaseHas('instructors', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.instructors.update', $instructor),
            $data
        );

        $data['id'] = $instructor->id;

        $this->assertDatabaseHas('instructors', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_instructor()
    {
        $instructor = Instructor::factory()->create();

        $response = $this->deleteJson(
            route('api.instructors.destroy', $instructor)
        );

        $this->assertModelMissing($instructor);

        $response->assertNoContent();
    }
}
