<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HolidayPackage;
use App\Models\PackageVariant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CategorySeed::class]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Fetch all categories
        $categories = Category::all();

        // Create 11 holiday packages and associate them with random categories
        HolidayPackage::factory(11)
            ->create()
            ->each(function ($holidayPackage) use ($categories) {
                $holidayPackage->categories()->attach(
                    $categories->random(rand(1, count($categories)))->pluck('id')->toArray()
                );

                PackageVariant::factory(rand(1, 3))
                    ->for($holidayPackage, 'package')
                    ->create();
            });
    }
}
