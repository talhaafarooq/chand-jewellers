<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('front_img')->nullable();
            $table->string('back_img')->nullable();
            $table->decimal('old_price')->default(0);
            $table->decimal('new_price')->default(0);
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->text('highlights')->nullable();
            $table->text('description')->nullable();
            $table->string('polish')->nullable();
            $table->string('weight')->nullable();
            $table->string('karat')->nullable();
            $table->string('sku')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
