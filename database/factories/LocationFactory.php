<?php

namespace Database\Factories;

use App\Models\Dealer;
use App\Models\Zipcode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dealer_id' => Dealer::all()->random()->id,
            'name'      => $this->faker->unique()->company(),
            'address'   => $this->faker->address(),
            'phone'     => $this->faker->numerify('##########'),
            'email'     => $this->faker->unique()->safeEmail(),
            'zipcode'   => Zipcode::where('town','Houston')->get()->random()->zipcode,
            'website'   => $this->faker->url(),
        ];
    }
}
