<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ProductName', 50);
            $table->string('ProductTitle', 50);
            $table->string('ProductPrice', 20);
            $table->string('ProductStock', 20);
            $table->longText('ProductDescription');
            $table->string('ProductImg')->nullable();

            $table->unsignedBigInteger('UserId');
            $table->foreign('UserId')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('CategoryId');
            $table->foreign('CategoryId')->references('id')->on('categories')->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('BrandId');
            $table->foreign('BrandId')->references('id')->on('brands')->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
