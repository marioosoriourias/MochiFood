<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Image;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory(50)->create();
        
        foreach($companies as $company){
            Image::factory(1)->create([
                'imageable_id'=> $company->id,
                'imageable_type' => 'App\Models\Company'
            ]);

            $cont = 0;
            $companyID = array();
            $companyIDunicos = array();


            while ($cont <= 5 )
            {
                array_push($companyID,  Category::all()->random()->id);
                $companyIDunicos = array_unique($companyID);
                $cont = count($companyIDunicos);
            }
            

            foreach ($companyIDunicos as $Idunico)
            {
                DB::table('category_company')->insert([
                    'category_id' => $Idunico,
                    'company_id' => $company->id,
                ]);
            }
            
            
        }
    }
}
