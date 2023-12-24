<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategoryTableSeeder extends Seeder
{
    public function run(): void
    {
        $subCategory = new SubCategory();
        $subCategory->name = 'Ladies Rings';
        $subCategory->slug = Str::slug('Ladies Rings');
        $subCategory->category_id = 1;
        $subCategory->save();


        $subCategory = new SubCategory();
        $subCategory->name = 'Eartop - Earpins';
        $subCategory->slug = Str::slug('Eartop - Earpins');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Baby Boy Rings';
        $subCategory->slug = Str::slug('Baby Boy Rings');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Ladies Chains';
        $subCategory->slug = Str::slug('Ladies Chains');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Mala Set';
        $subCategory->slug = Str::slug('Mala Set');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Gaani Set';
        $subCategory->slug = Str::slug('Gaani Set');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Two Step Eartops';
        $subCategory->slug = Str::slug('Two Step Eartops');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Bangles - Karray کڑے';
        $subCategory->slug = Str::slug('Bangles Karray');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Ladies Bangles - چوڑیاں';
        $subCategory->slug = Str::slug('Ladies Bangles');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Ladies Bracelets';
        $subCategory->slug = Str::slug('Ladies Bracelets');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Baby Girl Rings';
        $subCategory->slug = Str::slug('Baby Girl Rings');
        $subCategory->category_id = 1;
        $subCategory->save();

        $subCategory = new SubCategory();
        $subCategory->name = 'Nose Pins - Nose Rings';
        $subCategory->slug = Str::slug('Nose Pins Nose Rings');
        $subCategory->category_id = 1;
        $subCategory->save();
    }
}
