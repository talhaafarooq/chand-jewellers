<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['title' => 'Ladies Rings', 'category' => 1],
            ['title' => 'Eartop - Earpins', 'category' => 1],
            ['title' => 'Baby Boy Rings', 'category' => 1],
            ['title' => 'Ladies Chains', 'category' => 1],
            ['title' => 'Mala Set', 'category' => 1],
            ['title' => 'Gaani Set', 'category' => 1],
            ['title' => 'Two Step Eartops', 'category' => 1],
            ['title' => 'Bangles - Karray کڑے', 'category' => 1],
            ['title' => 'Ladies Bangles - چوڑیاں', 'category' => 1],
            ['title' => 'Ladies Bracelets', 'category' => 1],
            ['title' => 'Baby Girl Rings', 'category' => 1],
            ['title' => 'Nose Pins - Nose Rings', 'category' => 1],
        ];

        foreach ($data as $entry) {
            Subcategory::create($entry);
        }
    }
}
