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
        Schema::create('pents', function (Blueprint $table) {
            $table->id();
            $table->string('pent_length');
            $table->string('waist');
            $table->string('hips');
            $table->string('inseam');
            $table->string('pensa');
            $table->string('pocket_type'); 
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pents');
    }
};
