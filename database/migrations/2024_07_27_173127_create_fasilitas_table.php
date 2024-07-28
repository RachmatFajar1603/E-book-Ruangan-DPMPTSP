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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->boolean('wifi')->nullable();
            $table->boolean('ac')->nullable();
            $table->boolean('proyektor')->nullable();
            $table->boolean('kursi')->nullable();
            $table->boolean('sofa')->nullable();
            $table->boolean('meja')->nullable();
            $table->boolean('meja_operator')->nullable();
            $table->boolean('komputer_operator')->nullable();
            $table->boolean('sound_system')->nullable();
            $table->boolean('dispenser')->nullable();
            $table->boolean('webcam')->nullable();
            $table->boolean('hdmi')->nullable();
            $table->boolean('stock_contact')->nullable();
            $table->boolean('panggung')->nullable();
            $table->boolean('whiteboard')->nullable();
            $table->boolean('space_spanduk')->nullable();
            $table->boolean('storage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
