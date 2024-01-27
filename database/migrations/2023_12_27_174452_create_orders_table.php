<?php

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('company')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->string('country');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->text('notes')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->enum('status',OrderStatusEnum::getValues())->default('received');
            $table->integer('order_no')->default(0);
            $table->string('tracking_no')->nullable();
            $table->string('tracking_company')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
