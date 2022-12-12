<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Zipcode;
use Illuminate\Database\Eloquent\Factories\Factory;

class DealerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'package_id'    => Package::all()->random()->id,
            'name'          => $this->faker->unique()->company(),
            'address'       => $this->faker->address(),
            'phone'         => $this->faker->numerify('##########'),
            'email'         => $this->faker->unique()->safeEmail(),
            'zipcode'       => Zipcode::where('town','Houston')->get()->random()->zipcode,
            'website'       => $this->faker->url(),
        ];
    }
}
