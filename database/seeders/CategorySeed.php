<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alamCategory = Category::factory()->create([
            'name' => 'alam',
            'slug' => 'alam'
        ]);

        Category::factory()->create([
            'name' => 'pantai',
            'slug' => 'pantai',
            'parent_id' => $alamCategory->id
        ]);

        Category::factory()->create([
            'name' => 'gunung',
            'slug' => 'gunung',
            'parent_id' => $alamCategory->id
        ]);

        Category::factory()->create([
            'name' => 'air terjun',
            'slug' => 'air-terjun',
            'parent_id' => $alamCategory->id
        ]);

        Category::factory()->create([
            'name' => 'religi',
            'slug' => 'religi',
        ]);

        Category::factory()->create([
            'name' => 'museum',
            'slug' => 'museum',
        ]);

        Category::factory()->create([
            'name' => 'sejarah',
            'slug' => 'sejarah',
        ]);
    }
}
