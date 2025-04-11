<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;
//use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=> $this->faker->sentence(mt_rand(2,7)),
            "slug"=> $this->faker->slug(3, true),
            "excerpt"=> $this->faker->sentence(mt_rand(6,12)),
            "body"=> '<p>'. implode('</p><p>',$this->faker->paragraphs(mt_rand(5,15))). '</p>',
            //"user_id"=>Auth::user()->id,
            "user_id"=>mt_rand(1,4),
            "category_id"=>mt_rand(1,3)
        ];
    }
}
