<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Progress;
use App\Models\Instructor;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstructorProgressesTest extends TestCase
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
    public function it_gets_instructor_progresses()
    {
        $instructor = Instructor::factory()->create();
        $progresses = Progress::factory()
            ->count(2)
            ->create([
                'instructor_id' => $instructor->id,
            ]);

        $response = $this->getJson(
            route('api.instructors.progresses.index', $instructor)
        );

        $response->assertOk()->assertSee($progresses[0]->abastecimento);
    }

    /**
     * @test
     */
    public function it_stores_the_instructor_progresses()
    {
        $instructor = Instructor::factory()->create();
        $data = Progress::factory()
            ->make([
                'instructor_id' => $instructor->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.instructors.progresses.store', $instructor),
            $data
        );

        $this->assertDatabaseHas('progress', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $progress = Progress::latest('id')->first();

        $this->assertEquals($instructor->id, $progress->instructor_id);
    }
}
