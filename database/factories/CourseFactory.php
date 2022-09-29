<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $title = fake()->sentence();
        $status = fake()->randomElement([Course::ERASER, Course::REVISION, Course::PUBLISHED]);
        // Va a generar un valor aleatorio de 8 caracteres de manera intercalada de letra letra digito digito
        // $code = fake()->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{2}');
        // $referral_code = null;
        $published = null;
        $observation = null;
        
        // Si el curso está publicado, debería haber una fecha de publicación y quizá un código de referido
        if ($status == Course::PUBLISHED) {
            $published = fake()->dateTime();
            // $referral_code = fake()->randomElement([$code, null]);
        // Si el curso está en revisión
        } elseif ($status == Course::REVISION) {
            $observation = fake()->randomElement([fake()->paragraph(), null]);
        }
        
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'subtitle' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'welcome_message' => fake()->paragraph(),
            'goodbye_message' => fake()->paragraph(),
            'observation' => $observation,
            'referral_code' => fake()->regexify('[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{2}'),
            'status' => $status,
            'published_at' => $published,
            'user_id' => User::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id,
        ];
    }
}
