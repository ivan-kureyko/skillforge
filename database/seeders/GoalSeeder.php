<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Goal;
use App\Models\User;
use App\Models\Course;
class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $courses = Course::all();

        foreach ($users as $user) {
            $randomCourses = $courses->random(rand(1, 3));

            foreach ($randomCourses as $course) {
                Goal::create([
                    'user_id' => $user->id,
                    'course_id' => $course->id,
                    'deadline' => now()->addDays(rand(10, 60)),
                    'status' => Goal::STATUS_NEW,
                ]);
            }
        }
    }
}
