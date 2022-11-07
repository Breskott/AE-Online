<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'placa' => $this->faker->text(255),
            'km' => $this->faker->randomNumber(0),
            'cor' => $this->faker->text(255),
            'marca' => $this->faker->text(255),
            'modelo' => $this->faker->text(255),
            'ano' => $this->faker->randomNumber(0),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
