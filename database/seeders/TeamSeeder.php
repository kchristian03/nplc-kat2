<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "TIM A",
            'school' => "Sekolah A",
            'score' => 0,
            'progress' => "1",
            'progress_story'=>"",
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "TIM B",
            'school' => "Sekolah B",
            'score' => 0,
            'progress' => "1",
            'progress_story'=>"",
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "TIM C",
            'school' => "Sekolah C",
            'score' => 0,
            'progress' => "1",
            'progress_story'=>"",
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "TIM D",
            'school' => "Sekolah D",
            'score' => 0,
            'progress' => "1",
            'progress_story'=>"",
            'user_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "TIM E",
            'school' => "Sekolah E",
            'score' => 0,
            'progress' => "1",
            'progress_story'=>"",
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
    ]);
    }
}
