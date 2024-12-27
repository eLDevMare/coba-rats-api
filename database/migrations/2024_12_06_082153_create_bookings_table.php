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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->date('date');
            $table->integer('duration')->nullable();
            $table->string('console')->nullable();
            $table->string('place')->nullable();
            $table->integer('total')->nullable();
            $table->string('type')->nullable();
            $table->enum('status',["accepted", "pending", "declined"])->nullable()->default("pending");
            $table->enum('role',["admin", "users"])->default("users");
            $table->integer('place_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
