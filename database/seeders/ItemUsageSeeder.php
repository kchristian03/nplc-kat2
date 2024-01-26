<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_usages')->insert([
            [
                "team_id"=>1,
                "code"=>"EXP",
                "duration"=>now()
            ],
            [
                "team_id"=>1,
                "code"=>"COIN",
                "duration"=>now()
            ],
            [
                "team_id"=>2,
                "code"=>"EXP",
                "duration"=>now()
            ],
            [
                "team_id"=>2,
                "code"=>"COIN",
                "duration"=>now()
            ],
            [
                "team_id"=>3,
                "code"=>"EXP",
                "duration"=>now()
            ],
            [
                "team_id"=>3,
                "code"=>"COIN",
                "duration"=>now()
            ],
            [
                "team_id"=>4,
                "code"=>"EXP",
                "duration"=>now()
            ],
            [
                "team_id"=>4,
                "code"=>"COIN",
                "duration"=>now()
            ],
            [
                "team_id"=>5,
                "code"=>"EXP",
                "duration"=>now()
            ],
            [
                "team_id"=>5,
                "code"=>"COIN",
                "duration"=>now()
            ],
            ]);
    }
}
