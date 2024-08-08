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
        Schema::create('vet_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vet_id')->index();
            $table->unsignedBigInteger('service_id')->index();
            $table->foreign('vet_id')->references('id')->on('vets')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vet_services');
    }
};
