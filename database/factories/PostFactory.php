<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()-> word(5,true),
            'image'=> 'https://dummyimage.com/800x400/000/fff',
            'body'=> fake()-> sentence(20,true),
            'user_id'=> fake()-> numberBetween(1,10),
        ];
    }
}
