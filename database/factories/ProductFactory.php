<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Salmón X5','Salmón ahumado X10','Palta X5','Tempura X5','Palta X10','Tempura X10']),
            'price' => $this->faker->numberBetween(200, 5000),
            'tipo' => $this->faker->randomElement(['geishas','nigiris','makis'])
        
        ];
    }
}
