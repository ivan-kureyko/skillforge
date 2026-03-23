<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Progress;
use App\Models\Goal;
class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Goal::all()->each(function ($goal) {
            Progress::factory()
                ->count(rand(2, 5))
                ->create([
                    'goal_id' => $goal->id,
                ]);
        });
    }
}
