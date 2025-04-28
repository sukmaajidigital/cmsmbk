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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('Laravel');
            $table->string('data_theme');
            $table->enum('dir', ['ltr', 'rtl'])->default('ltr');
            $table->string('logo')->default('');
            $table->string('icon')->default('');
            $table->timestamps();
        });
        Schema::create('landing_main', function (Blueprint $table) {
            $table->id();
            $table->string('shortname')->default('');
            $table->string('longname')->default('');
            $table->string('logo')->default('');
            $table->string('icon')->default('');
            $table->string('data_theme');
            $table->timestamps();
        });
        Schema::create('landing_contact', function (Blueprint $table) {
            $table->id();
            $table->string('telepon')->default('')->nullable();
            $table->string('alamat')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->text('maps')->default('')->nullable();
            $table->timestamps();
        });
        Schema::create('landing_about', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi')->default('')->nullable();
            $table->string('imageabout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
        Schema::dropIfExists('landing_main');
        Schema::dropIfExists('landing_contact');
        Schema::dropIfExists('landing_about');
    }
};
