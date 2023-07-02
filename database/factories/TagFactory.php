<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $colors = [
            'gray-200',
            'gray-700',
            'red-500',
            'yellow-200',
            'yellow-800',
            'green-300',
            'green-600',
            'blue-400',
            'indigo-600',
            'purple-400',
            'pink-300',
            'pink-600'
        ];
        $color = $colors[rand(0, 11)];

        $groupId = rand(1, 10);

        return [
            'name' => $this->faker->word,
            'color' => $color,
            'group_id' => $groupId,
        ];
    }
}
