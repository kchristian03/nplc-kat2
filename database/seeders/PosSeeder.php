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
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 30, 'exp_lost' => 22, 'coin_won' => 30, 'coin_lost' => 17, 'item_won' => 'JB', 'item_rate' => 25],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 30, 'exp_lost' => 23, 'coin_won' => 30, 'coin_lost' => 16, 'item_won' => 'KC', 'item_rate' => 25],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 35, 'exp_lost' => 20, 'coin_won' => 25, 'coin_lost' => 15, 'item_won' => 'HINT', 'item_rate' => 10],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 45, 'exp_lost' => 22, 'coin_won' => 36, 'coin_lost' => 15, 'item_won' => '2COIN30', 'item_rate' => 5],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 45, 'exp_lost' => 20, 'coin_won' => 38, 'coin_lost' => 15, 'item_won' => '2EXP15', 'item_rate' => 15],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 45, 'exp_lost' => 21, 'coin_won' => 37, 'coin_lost' => 15, 'item_won' => 'HINT', 'item_rate' => 10],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 41, 'exp_lost' => 20, 'coin_won' => 30, 'coin_lost' => 12, 'item_won' => '2COIN15', 'item_rate' => 15],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 39, 'exp_lost' => 22, 'coin_won' => 30, 'coin_lost' => 14, 'item_won' => 'KC', 'item_rate' => 25],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 35, 'exp_lost' => 20, 'coin_won' => 25, 'coin_lost' => 11, 'item_won' => '2COIN30', 'item_rate' => 10],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 43, 'exp_lost' => 25, 'coin_won' => 30, 'coin_lost' => 12, 'item_won' => 'JB', 'item_rate' => 25],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 30, 'exp_lost' => 20, 'coin_won' => 40, 'coin_lost' => 10, 'item_won' => 'KC', 'item_rate' => 25],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 30, 'exp_lost' => 20, 'coin_won' => 40, 'coin_lost' => 19, 'item_won' => 'HINT', 'item_rate' => 10],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 34, 'exp_lost' => 24, 'coin_won' => 25, 'coin_lost' => 18, 'item_won' => '2COIN15', 'item_rate' => 15],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 35, 'exp_lost' => 20, 'coin_won' => 30, 'coin_lost' => 10, 'item_won' => '2COIN15', 'item_rate' => 25],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 38, 'exp_lost' => 20, 'coin_won' => 30, 'coin_lost' => 14, 'item_won' => 'JB', 'item_rate' => 20],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 30, 'exp_lost' => 20, 'coin_won' => 28, 'coin_lost' => 20, 'item_won' => '2EXP30', 'item_rate' => 10],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 30, 'exp_lost' => 25, 'coin_won' => 25, 'coin_lost' => 15, 'item_won' => '2EXP30', 'item_rate' => 7],
            ['score_won' => 10, 'score_lost' => 2, 'exp_won' => 36, 'exp_lost' => 20, 'coin_won' => 36, 'coin_lost' => 16, 'item_won' => '2COIN30', 'item_rate' => 20],
        ];


        foreach ($rallyData as $data) {
            DB::table('pos')->insert($data);
        }
    }
}
