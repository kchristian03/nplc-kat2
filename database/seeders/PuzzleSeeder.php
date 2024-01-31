<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PuzzleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puzzles = [
            [
                'pos_code' => '1',
                'score_won' => 100,
                'score_lost' => 50,
                'score_mid' => 0,
                'code_won' => '2A',
                'code_lost' => '2B',
                'code_mid' => '',
                'entry_coin' => 25,
                'entry_exp' => 0,
                'forfitable' => true,
                'max_team' => 15,
                'time' => 10,
            ],
            [
                'pos_code' => '2A',
                'score_won' => 200,
                'score_lost' => 150,
                'score_mid' => 0,
                'code_won' => '3A',
                'code_lost' => '3B',
                'code_mid' => '',
                'entry_coin' => 50,
                'entry_exp' => 100,
                'forfitable' => true,
                'max_team' => 10,
                'time' => 10,
            ],
            [
                'pos_code' => '2B',
                'score_won' => 150,
                'score_lost' => 0,
                'score_mid' => 0,
                'code_won' => '3B',
                'code_lost' => '2B',
                'code_mid' => '',
                'entry_coin' => 50,
                'entry_exp' => 100,
                'forfitable' => false,
                'max_team' => 5,
                'time' => 3,
            ],
            [
                'pos_code' => '3A',
                'score_won' => 300,
                'score_lost' => 100,
                'score_mid' => 0,
                'code_won' => '4A',
                'code_lost' => '4B',
                'code_mid' => '',
                'entry_coin' => 50,
                'entry_exp' => 100,
                'forfitable' => false,
                'max_team' => 4,
                'time' => 15,
            ],
            [
                'pos_code' => '3B',
                'score_won' => 200,
                'score_lost' => 100,
                'score_mid' => 150,
                'code_won' => '4A',
                'code_lost' => '5',
                'code_mid' => '4B',
                'entry_coin' => 75,
                'entry_exp' => 300,
                'forfitable' => false,
                'max_team' =>10,
                'time' => 10,
            ],
            [
                'pos_code' => '4A',
                'score_won' => 1000,
                'score_lost' => 100,
                'score_mid' => 0,
                'code_won' => 'BEST',
                'code_lost' => '4B',
                'code_mid' => '',
                'entry_coin' => 75,
                'entry_exp' => 300,
                'forfitable' => true,
                'max_team' => 10,
                'time' => 15,
            ],
            [
                'pos_code' => '4B',
                'score_won' => 750,
                'score_lost' => 100,
                'score_mid' => 0,
                'code_won' => 'MEDIUM',
                'code_lost' => '5',
                'code_mid' => '',
                'entry_coin' => 50,
                'entry_exp' => 300,
                'forfitable' => false,
                'max_team' => 2,
                'time' => 5,
            ],
            [
                'pos_code' => '5',
                'score_won' => 350,
                'score_lost' => 0,
                'score_mid' => 0,
                'code_won' => 'BAD',
                'code_lost' => '5',
                'code_mid' => '',
                'entry_coin' => 50,
                'entry_exp' => 300,
                'forfitable' => true,
                'max_team' => 15,
                'time' => 10,
            ],
        ];

        foreach ($puzzles as $puzzle) {
            DB::table('puzzles')->insert($puzzle);
        }
    }
}
