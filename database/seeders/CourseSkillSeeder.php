<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Skill;

class CourseSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = Skill::all();
        $courses = Course::all();

        foreach ($skills as $skill) {
            $randomCourses = $courses->random(rand(1, 3));

            foreach ($randomCourses as $course) {
                $skill->courses()->attach($course->id);
            }
        }

    }
}
