<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(3, true);

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name),
            'sku' => strtoupper(Str::random(8)),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'stock' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(90),
            'featured_image' => $this->faker->imageUrl(640, 640, 'fashion', true),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3, true),
            'metadata' => [
                'color' => $this->faker->safeColorName(),
                'material' => $this->faker->randomElement(['leather', 'stainless', 'resin', 'cotton']),
            ],
        ];
    }
}

