<?php

namespace Database\Factories;

use App\Enums\PackageTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HolidayPackage>
 */
class HolidayPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'slug' => fake()->unique()->slug(),
            'description' => fake()->sentence(),
            'start_date' => fake()->dateTimeInInterval('+3 days', '+6 days'),
            'end_date' => fake()->dateTimeInInterval('+1 week', '+2 weeks'),
            'is_visible' => fake()->boolean(),
            'type' => fake()->randomElement(PackageTypeEnum::cases())->value,
            'available_at' => fake()->dateTimeBetween('now', '+3 days'),
            'image' => fake()->streetName()
        ];
    }
}
