<?php

namespace Database\Factories;

use App\Models\Image;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'filePath' => $this->faker->mimeType(),
        ];
    }
}
