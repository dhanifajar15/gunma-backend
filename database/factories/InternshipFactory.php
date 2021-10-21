<?php

namespace Database\Factories;

use App\Models\Internship;
use Illuminate\Database\Eloquent\Factories\Factory;

class InternshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Internship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'programName' => $this->faker->name(),
            'isOpen' => '1',
            'description' => $this->faker->sentence(rand(4,10)),
            'duration' => rand(1,12),
            'benefit' => $this->faker->sentence(rand(1,5)),
            'requirement' => $this->faker->sentence(rand(1,5)),
            'registrationLink' => $this->faker->sentence(1),
            'closeRegistration' => now(),

            'user_id' => rand(1,25),
            'tag_id' => rand(1,25),
        
            'location_id' => rand(1,25),





        ];
    }
}
