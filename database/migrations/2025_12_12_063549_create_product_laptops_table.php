<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_laptops', function (Blueprint $table) {
            $table->id();
            $table->string('barang')->require();
            $table->enum('kondisi', ['baru', 'bekas'])->nullable();
            $table->string('harga')->require();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_laptops');
    }
};
