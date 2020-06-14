<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('analytic_types')->truncate();

        DB::table('analytic_types')->insert([
            'name' => 'max_Bld_Height_m',
            'units' => 'm',
            'is_numeric' => true,
            'num_decimal_places' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('analytic_types')->insert([
            'name' => 'min_lot_size_m2',
            'units' => 'm2',
            'is_numeric' => true,
            'num_decimal_places' => 0,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('analytic_types')->insert([
            'name' => 'fsr',
            'units' => ':1',
            'is_numeric' => true,
            'num_decimal_places' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
