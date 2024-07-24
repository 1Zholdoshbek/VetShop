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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ky')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_tr')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_ky')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_tr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
