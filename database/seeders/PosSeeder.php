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
        $rallyData = [
            ['coin_won' => 30, 'exp_won' => 30, 'coin_lost' => 17, 'exp_lost' => 22, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'JB', 'item_rate' => 25],
            ['coin_won' => 30, 'exp_won' => 23, 'coin_lost' => 16, 'exp_lost' => 23, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'KC', 'item_rate' => 25],
            ['coin_won' => 25, 'exp_won' => 20, 'coin_lost' => 15, 'exp_lost' => 35, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'HINT', 'item_rate' => 10],
            ['coin_won' => 36, 'exp_won' => 22, 'coin_lost' => 15, 'exp_lost' => 45, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2COIN30', 'item_rate' => 5],
            ['coin_won' => 38, 'exp_won' => 20, 'coin_lost' => 15, 'exp_lost' => 45, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2EXP15', 'item_rate' => 15],
            ['coin_won' => 37, 'exp_won' => 21, 'coin_lost' => 15, 'exp_lost' => 45, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'HINT', 'item_rate' => 10],
            ['coin_won' => 30, 'exp_won' => 20, 'coin_lost' => 12, 'exp_lost' => 41, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2COIN15', 'item_rate' => 15],
            ['coin_won' => 30, 'exp_won' => 22, 'coin_lost' => 14, 'exp_lost' => 39, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'KC', 'item_rate' => 25],
            ['coin_won' => 25, 'exp_won' => 20, 'coin_lost' => 11, 'exp_lost' => 35, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2COIN30', 'item_rate' => 10],
            ['coin_won' => 30, 'exp_won' => 25, 'coin_lost' => 12, 'exp_lost' => 43, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'JB', 'item_rate' => 25],
            ['coin_won' => 40, 'exp_won' => 20, 'coin_lost' => 10, 'exp_lost' => 30, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'KC', 'item_rate' => 25],
            ['coin_won' => 40, 'exp_won' => 19, 'coin_lost' => 20, 'exp_lost' => 30, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'HINT', 'item_rate' => 10],
            ['coin_won' => 25, 'exp_won' => 18, 'coin_lost' => 15, 'exp_lost' => 34, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2COIN15', 'item_rate' => 15],
            ['coin_won' => 30, 'exp_won' => 10, 'coin_lost' => 10, 'exp_lost' => 35, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2COIN15', 'item_rate' => 25],
            ['coin_won' => 30, 'exp_won' => 14, 'coin_lost' => 15, 'exp_lost' => 38, 'score_won' => 10, 'score_lost' => 2, 'item_won' => 'JB', 'item_rate' => 20],
            ['coin_won' => 28, 'exp_won' => 20, 'coin_lost' => 20, 'exp_lost' => 30, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2EXP30', 'item_rate' => 10],
            ['coin_won' => 25, 'exp_won' => 15, 'coin_lost' => 15, 'exp_lost' => 30, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '2EXP30', 'item_rate' => 7],
            ['coin_won' => 36, 'exp_won' => 20, 'coin_lost' => 15, 'exp_lost' => 36, 'score_won' => 10, 'score_lost' => 2, 'item_won' => '5COIN15', 'item_rate' => 5],
        ];

        foreach ($rallyData as $data) {
            DB::table('pos')->insert($data);
        }
    }
}
