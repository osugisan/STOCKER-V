<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_id' => rand(1, 10),
            'name' => $this->faker->unique()->country,
            'qty' => rand(0, 10),
            'basic_stock' => rand(0, 10),
            'memo' => $this->faker->sentence,
            'code' => $this->faker->unique()->ean13,
            'item_img' => 'item-' . rand(1, 5),
        ];
    }
}
