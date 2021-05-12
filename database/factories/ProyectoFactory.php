<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proyecto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=> $this->faker->title(),
            'mini_descripcion'=> $this->faker->text(),
            'imagen'=> $this->faker->image(),
            'descripcion'=> $this->faker->text(),
        ];
    }
}
