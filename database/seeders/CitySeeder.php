<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::Create([
            'name' => 'Los mochis'
        ]);

        City::Create([
            'name' => 'Guasave'
        ]);

        City::Create([
            'name' => 'Culiacan'
        ]);
    }
}
