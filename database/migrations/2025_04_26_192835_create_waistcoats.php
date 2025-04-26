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
        Schema::create('waistcoats', function (Blueprint $table) {
            $table->id();
            
            $table->decimal('length', 8, 2);
            $table->decimal('waist', 8, 2);
            $table->decimal('chest', 8, 2);
            $table->decimal('shoulder', 8, 2);
            $table->string('pocket_type');
            
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waistcoats');
    }
};