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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('console');
            $table->integer('capacity');
            $table->enum('type', ['Reguler', 'VIP'])->default('Reguler');
            $table->foreignId('title_id')->references('id')->on('titles')->onDelete('cascade');
            $table->foreignId('description_id')->references('id')->on('descriptions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
