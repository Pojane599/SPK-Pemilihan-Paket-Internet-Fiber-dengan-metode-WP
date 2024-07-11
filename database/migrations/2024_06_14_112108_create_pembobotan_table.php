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
        Schema::create('pembobotan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('w1')->nullable(); // nullable(false) artinya wajib diisi (NOT NULL)
            $table->integer('w2')->nullable();
            $table->integer('w3')->nullable();
            $table->integer('w4')->nullable();
            $table->integer('w5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembobotan');
    }
};
