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
            'name' => "PlayerDanPlayerLainnya1",
            'school' => "Sekolah A",
            'score' => 0,
            'progress' => "1",
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "PlayerDanPlayerLainnya2",
            'school' => "Sekolah B",
            'score' => 0,
            'progress' => "1",
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "PlayerDanPlayerLainnya3",
            'school' => "Sekolah C",
            'score' => 0,
            'progress' => "1",
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "PlayerDanPlayerLainnya4",
            'school' => "Sekolah D",
            'score' => 0,
            'progress' => "1",
            'user_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'coin' => 100,
            'exp' => 0,
            'name' => "PlayerDanPlayerLainnya5",
            'school' => "Sekolah E",
            'score' => 0,
            'progress' => "1",
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
            ],
    ]);
    }
}
