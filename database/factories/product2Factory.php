<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class product2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->unique()->name,
            'price'=>$this->faker->numberBetween(100, 1000),
            'image'=>$this->faker->imageUrl($width = 640, $height = 480),
            'cate_id'=>1
        ];
    }
}
