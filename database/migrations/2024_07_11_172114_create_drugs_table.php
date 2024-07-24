<?php

use  Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ky')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_tr')->nullable();
            $table->string('image')->nullable();
            $table->longText('description');
            $table->longText('description_ky')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_tr')->nullable();
            $table->text('short_description')->nullable();
            $table->text('short_description_ky')->nullable();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_tr')->nullable();
            $table->decimal('price', 10, 3);
            $table->integer('stock');
            $table->integer('discount')->nullable();
            $table->text('code_2d')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('currency')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
};
