<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('logos');
        Storage::makeDirectory('logos');

        Storage::deleteDirectory('address_pictures');
        Storage::makeDirectory('address_pictures');

        $this->call(FoodTypeseeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(UserSeeder::class);
    }
}
