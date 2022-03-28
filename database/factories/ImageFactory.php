<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $url = "https://picsum.photos/1920/1200.jpg";
        $contents = file_get_contents($url);
        $imageName = Str::uuid() . ".jpg";
        
        Storage::put('logos/' . $imageName, $contents);

        return [
            'url' => 'logos/'.$imageName
        ];

        // return [
        //     'url' => 'logos/' . $this->faker->image('public/storage/logos', 640, 480, null, false)
        // ];
    }
}
