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
            'name'          => $this->faker->unique()->company(),
            'zipcode'       => Zipcode::where('town','Houston')->get()->random()->zipcode,
        ];
    }
}
