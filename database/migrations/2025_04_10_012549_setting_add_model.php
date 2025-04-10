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
        Schema::create('landing_proses', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('')->nullable();
            $table->text('deskripsi')->default('')->nullable();
            $table->string('imageproses')->default('')->nullable();
            $table->timestamps();
        });
        Schema::create('landing_vidio', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->default('')->nullable();
            $table->text('deskripsi')->default('')->nullable();
            $table->string('vidio')->default('')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_proses');
        Schema::dropIfExists('landing_vidio');
    }
};
