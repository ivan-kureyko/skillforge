<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Skill;
use App\Models\User;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = Skill::all();
        $authors = User::where('role', User::ROLE_MENTOR)->get();

        foreach ($skills as $skill) {
            Course::factory()
                ->count(rand(1, 3))
                ->create([
                    'skill_id' => $skill->id,
                    'author_id' => $authors->random()->id,
                ]);
        }
    }
}
