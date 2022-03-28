<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;



class AddressImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
  
            DB::table('address_images')->insert([
                'name' => "hola",
                'address_id' => 1,
                'description' => "hola como estas",
                'url' => 'address_pictures/'
            ]);
    }
}
