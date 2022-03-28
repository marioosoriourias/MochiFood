<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Service;
use App\Models\Payment;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;




class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses =  Address::factory(50)->create();
        $faker = Factory::create();
        
        foreach($addresses as $address)
        {
            $cont = 0;
            $serviceID = array(1);
            $serviceIDunicos = array();

            Image::factory(1)->create([
                'imageable_id'=>  $address->id,
                'imageable_type' => 'App\Models\Address'
            ]);


            while ($cont <= 2 )
            {
                array_push($serviceID,  Service::all()->random()->id);
                $serviceIDunicos = array_unique($serviceID);
                $cont = count($serviceIDunicos);
            }
            
        
            foreach ($serviceIDunicos as $Idunico)
            {
                DB::table('address_service')->insert([
                    'address_id' => $address->id,
                    'service_id' => $Idunico,
                ]);
            }

            DB::table('address_payment')->insert([
                'address_id' => $address->id,
                'payment_id' => Payment::all()->random()->id,
            ]);

        


            for ($q=1; $q <= 5 ; $q++) { 

                $url = "https://picsum.photos/1920/1200.jpg";
                $contents = file_get_contents($url);
                $imageName = Str::uuid() . ".jpg";
                Storage::put('address_pictures/' . $imageName, $contents);
           
                DB::table('address_images')->insert([
                    'name' => $faker->sentence, 
                    'description' => $faker->paragraph,
                    'url' => 'address_pictures/'.$imageName,
                    'address_id' => $address->id,
                ]);
            }
           
        }
    }
}
