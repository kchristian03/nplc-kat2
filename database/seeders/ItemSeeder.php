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
                'price' => 30,
                'image_path' => '/items/doublexp15.png',
            ],
            [
                'code' => '2EXP30',
                'name' => 'Double EXP 30 Minutes Card',
                'description' => 'Doubles your experience points for 30 minutes.',
                'duration' => 30,
                'price' => 45,
                'image_path' => '/items/doublexp30.png',
            ],
            [
                'code' => 'HINT',
                'name' => 'Hint Card',
                'description' => 'Provides a hint for a specific puzzle. Can be used once.',
                'duration' => 1,
                'price' => 200,
                'image_path' => '/items/hint.png',
            ],
            [
                'code' => '2COIN15',
                'name' => 'Double Coin 15 Minutes Card',
                'description' => 'Doubles your earned coins for 15 minutes.',
                'duration' => 15,
                'price' => 30,
                'image_path' => '/items/doublecoin15.png',
            ],
            [
                'code' => '2COIN30',
                'name' => 'Double Coin 30 Minutes Card',
                'description' => 'Doubles your earned coins for 30 minutes.',
                'duration' => 30,
                'price' => 45,
                'image_path' => '/items/doublecoin30.png',
            ],
            [
                'code' => 'JB',
                'name' => 'Jailbreak Pass',
                'description' => 'Allows you to escape from security bots or monsters once.',
                'duration' => 1,
                'price' => 30,
                'image_path' => '/items/jailbreakpass.png',
            ],
            [
                'code' => 'KC',
                'name' => 'Key Card',
                'description' => 'Unlocks specific puzzle.',
                'duration' => 9999999,
                'price' => 50,
                'image_path' => '/items/keycardpass.png',
            ],
        ]);
    }
}
