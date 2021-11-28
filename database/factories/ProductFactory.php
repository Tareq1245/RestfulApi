<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
class ProductFactory extends Factory
{

  protected $model = Product::class;
  // protected $table = 'users';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->word,
          'description' => $this->faker->paragraph(1),
          'quantity' => $this->faker->numberBetween(1,10),
          'status' => $this->faker->randomElement([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
          'image' => $this->faker->randomElement(['1.jpg']),
          // Here we use User class because before doing any
          // transaction we don't know the user is a buyer or seller
          // and also Seller model extends by User.
          'seller_id' => User::all()->random()->id,
          //User::inRandomOrder()->first()->id,

        ];
    }
}
