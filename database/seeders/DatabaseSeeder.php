<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       
        $csvData = fopen(base_path('database/csv/album_sales.csv'), 'r');
        $transRow = true;
        $faker = Factory::create();

        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {

                $artist = Artist::firstOrCreate(
                    ['name' => $data[0]],
                    ['code' => $faker->randomNumber(5, false)]
                );

                $album = $artist->albums()->create([
                    'name' => $data[1],
                    'year' => '2022',
                    'sales' => $data[2]
                ]);

              
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
