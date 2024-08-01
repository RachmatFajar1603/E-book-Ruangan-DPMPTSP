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
        if (Schema::hasTable('bidangs')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('nip_reg')->unique();
                $table->string('email'); 
                $table->string('nama')->unique();
                $table->string('telepon')->unique();
                $table->unsignedBigInteger('bidang_id');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('keterangan')->nullable();
                $table->string('role')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
    
                $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('cascade');
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};