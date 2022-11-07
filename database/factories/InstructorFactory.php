<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instructor::class;

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
            'credencial' => $this->faker->text(255),
            'email' => $this->faker->email,
        ];
    }
}
