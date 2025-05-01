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
            $table->decimal('pent_length', 5, 2);
            $table->decimal('waist', 5, 2);
            $table->decimal('hips', 5, 2);
            $table->decimal('inseam', 5, 2);
            $table->decimal('pensa', 5, 2);
            $table->string('pocket_type');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
