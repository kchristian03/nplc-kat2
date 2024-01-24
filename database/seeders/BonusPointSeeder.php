<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BonusPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [1, 50, 100, 150, 150, 25],
            [2, 45, 90, 135, 135, 25],
            [3, 45, 90, 135, 135, 25],
            [4, 40, 80, 120, 120, 25],
            [5, 40, 80, 120, 120, 25],
            [6, 35, 70, 105, 105, 20],
            [7, 35, 70, 105, 105, 20],
            [8, 30, 60, 90, 90, 20],
            [9, 30, 60, 90, 90, 20],
            [10, 25, 50, 75, 75, 20],
            [11, 25, 50, 75, 75, 15],
            [12, 20, 40, 60, 60, 15],
            [13, 20, 40, 60, 60, 15],
            [14, 15, 30, 45, 45, 15],
            [15, 15, 30, 45, 45, 15],
            [16, 10, 20, 30, 30, 10],
            [17, 10, 20, 30, 30, 10],
            [18, 5, 10, 15, 15, 10],
            [19, 5, 10, 15, 15, 10],
            [20, 5, 10, 15, 15, 10],
        ];

        foreach ($data as $row) {
            DB::table('bonus_scores')->insert([
                '1' => $row[1],
                '2' => $row[2],
                '3' => $row[3],
                '4' => $row[4],
                '5' => $row[5],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
