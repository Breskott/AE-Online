<?php

namespace Database\Factories;

use App\Models\Progress;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Progress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'abastecimento' => $this->faker->text(255),
            'valor' => $this->faker->randomNumber(2),
            'hora_ini' => $this->faker->text(255),
            'hora_fim' => $this->faker->text(255),
            'car_id' => \App\Models\Car::factory(),
            'instructor_id' => \App\Models\Instructor::factory(),
            'student_id' => \App\Models\Student::factory(),
        ];
    }
}
