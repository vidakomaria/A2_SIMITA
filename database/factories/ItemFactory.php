<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idBarang' =>$this->faker->randomNumber(5, true),
            'namaBarang' =>$this->faker->word(2),
            'hargaBeli' =>$this->faker->randomNumber(5, true),
            'hargaJual' =>$this->faker->randomNumber(5, true),
            'category_id' =>mt_rand(1,3)
        ];
    }
}
