<?php

namespace Database\Seeders;

use App\Models\Food_type;
use Illuminate\Database\Seeder;

class FoodTypeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Food_type::Create([
            'name' => 'Comida'
        ]);

        Food_type::Create([
            'name' => 'Bebida'
        ]);

        Food_type::Create([
            'name' => 'Snack'
        ]);

    }
}
