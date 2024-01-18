<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pos')->insert([
            [
                'pos_code' => '1',
                'coin_won' => 100,
                'exp_won' => 50,
                'coin_lost' => 0,
                'exp_lost' => 10,
                'score_won' => 500,
                'score_lost' => 100,
                'forfitable' => true,
                'time' => 10,
            ]
            ]);
    }
}
