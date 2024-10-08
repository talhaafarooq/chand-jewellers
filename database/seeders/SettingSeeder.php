<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Settings::create([
            'name' => 'Chand Jewellers',
            'email' => 'chandjewellers2017@gmail.com',
            'phone1' => '+92-3446400851',
            'phone2' => '+92-3446400851',
            'city' => 'Gujrat',
            'state' => 'Punjab',
            'zipcode' => '50700',
            'address1' => 'Chand Jewellers, Sarafa Bazar, Gujrat City.',
            'address2' => 'Chand Jewellers, Hajiwala, Karianwala.',
            'about_us' => 'We are a team of designers and developers that create high quality HTML Template & Woocommerce, Shopify Theme.',
            'facebook' => 'https://www.facebook.com',
            'instagram1' => 'https://www.instagram.com',
            'instagram2' => 'https://www.instagram.com',
            'whatsapp' => 'https://www.whatsapp.com',
            'tiktok1' => 'https://www.tiktok.com',
            'tiktok2' => 'https://www.tiktok.com',
            'snack1' => 'https://www.snack.com',
            'snack2' => 'https://www.snack.com',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6802.302759454274!2d74.3199392!3d31.520002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391905407ed24da9%3A0xa339081520e94101!2sNoble%20Hospital!5e0!3m2!1sen!2s!4v1703185936680!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'currency' => 'Rs.',
            'website' => 'https://www.chandjewellersgujrat.com',
            'shipping'=>'500',
            'advance_charges'=>'500',
            'cod'=>'500',
            'advertising'=>'This is advertising campaign',
            'header_logo'=>'settings/logo.png',
            'footer_logo'=>'settings/logo.png',
            'footer_description'=>'We are a team of designers and developers that create high quality HTML Template & Woocommerce, Shopify Theme.',
        ]);
    }
}
