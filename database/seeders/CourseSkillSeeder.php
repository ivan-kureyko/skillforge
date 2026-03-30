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
        $courses = Course::all();
        $skillIds = Skill::pluck('id')->all();

        foreach ($courses as $course) {
            $pool = $skillIds;
            $selectedSkillIds = [];
            $count = rand(1, min(3, count($pool)));

            for ($i = 0; $i < $count; $i++) {
                $randomKey = array_rand($pool);
                $selectedSkillIds[] = $pool[$randomKey];
                unset($pool[$randomKey]);
            }

            $course->skills()->sync($selectedSkillIds);
        }

    }
}
