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
        Schema::create('drug_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drug_id')->index();
            $table->foreign('drug_id')
                ->references('id')
                ->on('drugs');
            $table->string('file_path');
            $table->string('type');
            $table->float('size');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_galleries');
    }
};
