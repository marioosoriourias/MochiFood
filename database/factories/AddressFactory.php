<?php

namespace Database\Factories;


use App\Models\Address;
use App\Models\City;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $phone = $this->faker->unique()->e164PhoneNumber;
        $phone = substr($phone, 1);

        return [
            'address' => $this->faker->address,
            'phone' => $phone,
            'open'=> $this->faker->randomElement(['07:00', '08:00','09:00']),
            'closed'=> $this->faker->randomElement(['19:00', '20:00','21:00']),
            'latitude' => $this->faker->latitude($min = 25.74, $max = 25.83),
            'longitude' => $this->faker->longitude($min = -108.96, $max = -109.04),
            'city_id' => City::all()->random()->id,
            'company_id' => Company::all()->random()->id
        ];

        
    }
}
