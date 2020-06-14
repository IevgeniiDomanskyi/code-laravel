<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->parse();

        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('property_analytics')->truncate();

        foreach ($data as $row) {
            $row['created_at'] = $now;
            $row['updated_at'] = $now;

            DB::table('property_analytics')->insert($row);
        }
    }

    protected function parse()
    {
        $result = [];

        $filename = 'property_analytics.csv';
        $path = resource_path('files\\'.$filename);

        if (file_exists($path)) {
            $h = fopen($path, 'r');
            $head = fgetcsv($h, 1000, ',');

            while (($row = fgetcsv($h, 1000, ',')) !== false) {
                $temp = [];
                foreach ($row as $index => $value) {
                    $temp[$head[$index]] = $value;
                }

                $result[] = $temp;
            }
            fclose($h);
        }

        return $result;
    }
}
