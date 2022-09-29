<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->sentence();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'video_url' => 'https://www.youtube.com/watch?v=EbfTJ0n1C4g&list=RDMMEbfTJ0n1C4g&start_radio=1&ab_channel=PeloMaduenoVEVO',
            'video_original_name' => 'Pelo Madueño - Soledad (En Vivo) ft. Pamela Rodriguez',
            'published' => true,
            'preview' => fake()->randomElement([true, false]),
            'poster_url' => 'https://i.ytimg.com/vi/EbfTJ0n1C4g/hq720.jpg?sqp=-oaymwEcCNAFEJQDSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLDpvz8E7bNln0D1hkFR0iJpg0fHQw',
            'duration' => '06:13:00',
            'processed' => true,
            'platform_id' => 1,
        ];
    }
}
