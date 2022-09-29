<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // Usaremos otra alternativa porque faker anda fallando
            // 'url' => 'courses/' . fake()->image('public/storage/courses', 640, 480, null, false),      
            'url' => 'https://api.lorem.space/image/face?w=640&h=480&key=' . Str::random(64),      
        ];
    }
}
