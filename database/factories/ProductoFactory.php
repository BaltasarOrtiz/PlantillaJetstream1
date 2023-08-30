<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            //

            'title' => $title,
            'titleSmall' => substr($title, 0, 38 ),
            'slug' => Str::slug($title, '-'), #reemplazar los espacios que tiene el titulo por guiones
            'descripcion' => fake()->paragraph(),
            'categoria' => fake()->randomElement(['fps', 'escolar', 'shooter']),
            'precio' => fake()->randomFloat(2, 100, 10000),
            'image' => 'productos/'. fake()->image('public/storage/productos', 640, 480, null, false),
            'stock' => fake()->numberBetween(0, 100)
        ];
    }
}
