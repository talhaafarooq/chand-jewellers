<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    public function run(): void
    {
        AboutUs::create([
            'about'=>"Chand Jewellers is the biggest puregold jewellery store in the area of Gujrat, Gujranwala, Sialkot, M B Din, Sargodah, Jhelum and province punjab. We provide the pure gold jewellery at very discount rates with a lifetime guarantee. Further, we deliver at your home address with complete insurance and responsibility.",
        ]);
    }
}
