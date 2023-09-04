<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'name' =>  fake()->word(),
            'category' =>  fake()->randomElement($array = array ('Electronics','Clothing and Apparel','Home and Kitchen','Health and Wellness','Beauty and Personal Care','Automotive','Sports and Outdoors','Toys and Games','Food and Beverages','Books and Media')) ,
            'description' => fake()->paragraph(),
            'date_and_time' => fake()->dateTime($max = 'now', $timezone = null),
        ];
    }
}
