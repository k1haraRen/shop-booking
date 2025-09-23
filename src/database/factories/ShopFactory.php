<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => '1',
            'shop_name' => $this->faker->name(),
            'pic_url' => null,
            'introduction' => '紹介文',
        ];
    }
}
