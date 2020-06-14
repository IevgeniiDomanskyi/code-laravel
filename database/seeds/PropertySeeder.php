<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('properties')->truncate();

        for ($i = 0; $i < 14; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'Parramatta',
                'state' => 'NSW',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'Ryde',
                'state' => 'NSW',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('properties')->insert([
            'guid' => Str::uuid()->toString(),
            'suburb' => 'Castle Hill',
            'state' => 'NSW',
            'country' => 'Australia',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        for ($i = 0; $i < 16; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'Richmond',
                'state' => 'NSW',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'Southbank',
                'state' => 'Qld',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 0; $i < 8; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'O\'Sullivan Beach',
                'state' => 'Qld',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 0; $i < 16; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'Geelong',
                'state' => 'Vic',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('properties')->insert([
            'guid' => Str::uuid()->toString(),
            'suburb' => 'Fitzroy',
            'state' => 'Vic',
            'country' => 'Australia',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        for ($i = 0; $i < 19; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'Richmond',
                'state' => 'Vic',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 0; $i < 8; $i++) {
            DB::table('properties')->insert([
                'guid' => Str::uuid()->toString(),
                'suburb' => 'Subiaco',
                'state' => 'WA',
                'country' => 'Australia',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
