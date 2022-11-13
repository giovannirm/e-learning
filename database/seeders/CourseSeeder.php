<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Description;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Requirement;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::factory(100)->create();

        foreach ($courses as $course) {
            Image::factory(1)->create([  
                'imageable_id' => $course->id,
                'imageable_type' => Course::class,
            ]);

            $position = range(1,4);
            shuffle($position);
            for ($i = 0; $i <= 3; $i++) { 
                Requirement::factory(1)->create([
                    'course_id' => $course->id,
                    'position' => $position[$i],
                ]);
            }

            $position = range(1,4);
            shuffle($position);
            for ($i = 0; $i <= 3; $i++) {
                Goal::factory(1)->create([
                    'course_id' => $course->id,
                    'position' => $position[$i],
                ]);
            }          

            $position = range(1,4);
            shuffle($position);
            for ($i = 0; $i <= 3; $i++) {
                $section = Section::factory(1)->create([
                    'course_id' => $course->id,
                    'position' => $position[$i],
                ]);

                $position_lesson = range(1,4);
                shuffle($position_lesson);
                for ($j = 0; $j <= 3; $j++) {
                    $lesson = Lesson::factory(1)->create([
                        'section_id' => $section[0]->id,
                        'position' => $position_lesson[$i],
                    ]);
                    Description::factory(1)->create([
                        'lesson_id' => $lesson[0]->id,
                    ]);
                }
            }
        }
    }
}
