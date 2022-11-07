<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Student;
use App\Models\Progress;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentProgressesTest extends TestCase
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
    public function it_gets_student_progresses()
    {
        $student = Student::factory()->create();
        $progresses = Progress::factory()
            ->count(2)
            ->create([
                'student_id' => $student->id,
            ]);

        $response = $this->getJson(
            route('api.students.progresses.index', $student)
        );

        $response->assertOk()->assertSee($progresses[0]->abastecimento);
    }

    /**
     * @test
     */
    public function it_stores_the_student_progresses()
    {
        $student = Student::factory()->create();
        $data = Progress::factory()
            ->make([
                'student_id' => $student->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.students.progresses.store', $student),
            $data
        );

        $this->assertDatabaseHas('progress', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $progress = Progress::latest('id')->first();

        $this->assertEquals($student->id, $progress->student_id);
    }
}
