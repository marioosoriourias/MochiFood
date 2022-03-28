<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::Create([
            'name' => 'Consumo en el lugar'
        ]);

        Service::Create([
            'name' => 'Para llevar'
        ]);

        Service::Create([
            'name' => 'Entrega a domicilio'
        ]);
    }
}
