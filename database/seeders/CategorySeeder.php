<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $categories = ["Alitas", "Sushi", "Pizza", "Mariscos", "Ensalada", "Comida china", "Tacos", "Cafe" ,"Postres" ,"hyt"];
        foreach($categories as $category){
            Category::Create([
                'name' => $category
            ]);

        }


        $categories = Category::all();

        foreach($categories as $category){
            $categoryName = preg_replace('/\s+/', '-',  $category->name);
            Image::create([
                'imageable_id'=> $category->id,
                'imageable_type' => 'App\Models\Category',
                'url' => 'food_icons/'.$categoryName.'.png'
            ]);
        }
    }
}
