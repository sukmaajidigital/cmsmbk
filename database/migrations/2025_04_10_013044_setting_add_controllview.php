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
        Schema::create('landing_controllview', function (Blueprint $table) {
            $table->id();
            $table->string('hero_tagline')->default('')->nullable();
            $table->string('hero_subtagline')->default('')->nullable();
            $table->string('hero_button')->default('')->nullable();
            $table->string('hero_image')->default('')->nullable();
            $table->string('proses_title')->default('')->nullable();
            $table->string('proses_subtitle')->default('')->nullable();
            $table->string('produk_title')->default('')->nullable();
            $table->string('produk_subtitle')->default('')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_controllview');
    }
};
