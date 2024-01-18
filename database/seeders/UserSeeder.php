<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Player1',
                'email' => 'player1@nplc.com',
                'email_verified_at' => now(),
                'role' => 'player',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Player2',
                'email' => 'player2@nplc.com',
                'email_verified_at' => now(),
                'role' => 'player',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Player3',
                'email' => 'player3@nplc.com',
                'email_verified_at' => now(),
                'role' => 'player',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Player4',
                'email' => 'player4@nplc.com',
                'email_verified_at' => now(),
                'role' => 'player',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Player5',
                'email' => 'player5@nplc.com',
                'email_verified_at' => now(),
                'role' => 'player',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'LO1',
                'email' => 'lo1@nplc.com',
                'email_verified_at' => now(),
                'role' => 'lo',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'LO2',
                'email' => 'lo2@nplc.com',
                'email_verified_at' => now(),
                'role' => 'lo',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'LO3',
                'email' => 'lo3@nplc.com',
                'email_verified_at' => now(),
                'role' => 'lo',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'LO4',
                'email' => 'lo4@nplc.com',
                'email_verified_at' => now(),
                'role' => 'lo',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ],
            // Add more users as needed with different roles
        ]);
    }
}
