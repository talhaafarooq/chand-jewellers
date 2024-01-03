<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('country_code');
            $table->string('region_name');
            $table->string('city');
            $table->string('zip');
            $table->string('lat');
            $table->string('lon');
            $table->string('timezone');
            $table->string('isp');
            $table->string('ip_address');
            $table->integer('visit')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
