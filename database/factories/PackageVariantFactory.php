<?php

namespace Database\Factories;

use App\Models\HolidayPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackageVariant>
 */
class PackageVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'package_id' => HolidayPackage::factory(),
            'name' => fake()->word(),
            'slug' => fake()->unique()->slug(),
            'price' => fake()->randomNumber(5),
            'facilities' => fake()->paragraph(3),
            'is_visible' => fake()->boolean(),
            'is_featured' => fake()->boolean(),
        ];
    }
}
