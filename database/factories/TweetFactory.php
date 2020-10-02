<?php

namespace Database\Factories;

use App\Models\Tweet as Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as faker;
use App\Models\User;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::class,
            'body' => $this->faker->sentence,
        ];
    }
}

// $factory->define(App\Tweet::class, function(Faker\Generator $faker){
//     return [
//         'user_id' => User::factory(),
//         'body' => $faker->sentence
//     ];
// });
