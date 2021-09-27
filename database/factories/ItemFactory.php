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
            'id_barang'     => $this->faker->randomNumber(5, true),
            'nama_barang'   =>$this->faker->word(2),
            'harga_beli'    =>$this->faker->randomNumber(5, true),
            'harga_jual'    =>$this->faker->randomNumber(5, true),
            'stok'          => $this->faker->randomNumber(2),
            'category_id'   => mt_rand(1,3),
        ];
    }
}
