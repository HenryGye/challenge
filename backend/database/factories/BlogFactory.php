<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Usuario;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => Usuario::factory(),
            'titulo' => $this->faker->sentence(),
            'descripcion' => Str::limit($this->faker->paragraph(), 250),
            'fecha_publicacion' => $this->faker->dateTime(),
        ];
    }
}
