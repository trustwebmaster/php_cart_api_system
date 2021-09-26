<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'product_identifier' => uniqid(),
            'description' => $this->faker->paragraph(10),
            'user_id' => function(){
                   return User::factory()->create()->id;
            }
        ];
    }
}
