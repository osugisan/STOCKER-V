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
        $bg_colors = [
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
        
        $bg_color = $bg_colors[rand(0, 11)];
        $text_color = $this->setTextColor($bg_color);
        
        $groupId = rand(1, 10);
        
        return [
            'name' => $this->faker->word,
            'bg_color' => $bg_color,
            'text_color' => $text_color,
            'group_id' => $groupId,
        ];
    }

    public function setTextColor($bg_color) {
        switch($bg_color) {
            case 'gray-200':
            case 'yellow-200':
            case 'green-300':
            case 'purple-400':
            case 'pink-300':
                return 'gray-600';
            case 'gray-700':
            case 'red-500':
            case 'yellow-800':
            case 'green-600':
            case 'blue-400':
            case 'indigo-600':
            case 'pink-600':
                return 'white';
        }
    }
}
