<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'event_title' => "My Event",
            'from' => Carbon::now()->format('Y-m-d'),
            'to' => Carbon::now()->format('Y-m-d'),
            'days' => json_encode([
                "mon" => false,
                "tue" => true,
                "wed" => false,
                "thu" => false,
                "fri" => true,
                "sat" => false,
                "sun" => false,
            ]),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
