<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'code' => '2EXP15',
                'name' => 'Double EXP 15 Minutes Card',
                'description' => 'Doubles your experience points for 15 minutes.',
                'duration' => 15,
                'price' => 20,
                'image_path' => '', // Replace with actual path
            ],
            [
                'code' => '2EXP30',
                'name' => 'Double EXP 30 Minutes Card',
                'description' => 'Doubles your experience points for 30 minutes.',
                'duration' => 30,
                'price' => 35,
                'image_path' => '', // Replace with actual path
            ],
            [
                'code' => 'HINT',
                'name' => 'Hint Card',
                'description' => 'Provides a hint for a specific puzzle. Can be used once.',
                'duration' => 1, // Assuming no duration for one-time use items
                'price' => 300,
                'image_path' => '', // Replace with actual path
            ],
            [
                'code' => '2COIN15',
                'name' => 'Double Coin 15 Minutes Card',
                'description' => 'Doubles your earned coins for 15 minutes.',
                'duration' => 15,
                'price' => 20,
                'image_path' => '', // Replace with actual path
            ],
            [
                'code' => '2COIN30',
                'name' => 'Double Coin 30 Minutes Card',
                'description' => 'Doubles your earned coins for 30 minutes.',
                'duration' => 30,
                'price' => 35,
                'image_path' => '', // Replace with actual path
            ],
            [
                'code' => 'JB',
                'name' => 'Jailbreak Pass',
                'description'=>'allows you to escape from security bots or monsters once.',
                'duration' => 1, // Assuming no duration for one-time use items
                'price' => 20,
                'image_path' => '', // Replace with actual path
            ],
            [
                'code' => 'COIN15Fifthtime',
                'name' => 'Fifth-Time Coin 15 Minutes Card',
                'description' => 'Doubles your earned coins for 15 minutes on your fifth purchase only.',
                'duration' => 15,
                'price' => 75,
                'image_path' => '', // Replace with actual path
            ],
            [
                'code' => 'KC',
                'name' => 'Key Card',
                'description' => 'Unlocks 3a area permanently.',
                'duration' => 9999999, // Assuming permanent duration for a Key Card
                'price' => 50,
                'image_path' => '', // Replace with actual path
            ],
        ]);
    }
}
