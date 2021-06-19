<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Inicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class InicioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => '1',
            'title'=> 'Proyectos'
        ];
    }
}
