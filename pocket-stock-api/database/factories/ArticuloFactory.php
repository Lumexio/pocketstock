<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Articulo;

class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Str::random(4),
            'quantity' => $this->faker->numberBetween(1, 100),
            'category_id' => $this->faker->unique(true)->numberBetween(1, 3),
            'status_id' => $this->faker->unique(true)->numberBetween(1, 3),
            'rack_id' => $this->faker->unique(true)->numberBetween(1, 2),
            'crossbar_id' => $this->faker->unique(true)->numberBetween(1, 2),
            'user_id' => $this->faker->unique(true)->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
