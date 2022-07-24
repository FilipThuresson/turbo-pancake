<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'product_id' => Product::factory(),
            'image_path' => Str::random(30) . '.jpg',
        ];
    }
}
