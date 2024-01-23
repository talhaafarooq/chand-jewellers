<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('about_us');
            $table->string('facebook')->nullable();
            $table->string('instagram1')->nullable();
            $table->string('instagram2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok1')->nullable();
            $table->string('tiktok2')->nullable();
            $table->string('snack1')->nullable();
            $table->string('snack2')->nullable();
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('map',1000)->nullable();
            $table->string('currency',20)->nullable();
            $table->decimal('shipping')->default(0);
            $table->decimal('advance_charges')->default(0);
            $table->string('website')->nullable();
            $table->string('cod')->nullable();
            $table->string('advertising',2000)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
