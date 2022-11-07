<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->text(255),
            'cpf' => $this->faker->cpf(false),
            'rg' => $this->faker->rg(false),
            'telefone' => $this->faker->text(255),
            'celular' => $this->faker->text(255),
            'rua' => $this->faker->text(255),
            'numero' => $this->faker->text(255),
            'bairro' => $this->faker->text(255),
            'cidade' => $this->faker->text(255),
            'status_aula' => $this->faker->text(255),
        ];
    }
}
