<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\PuzzleSeeder;
use Database\Seeders\BonusPointSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            PosSeeder::class,
            ItemSeeder::class,
            TeamSeeder::class,
            PuzzleSeeder::class,
            BonusPointSeeder::class,
            ItemUsageSeeder::class
        ]);

    }
}
