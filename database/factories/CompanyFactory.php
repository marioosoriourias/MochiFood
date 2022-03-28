<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Food_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,                  
            'description'=> $this->faker->sentence,
            'website' => $this->faker->unique()->domainName, 
            'food_type_id' => Food_type::all()->random()->id
        ];
    }
}
