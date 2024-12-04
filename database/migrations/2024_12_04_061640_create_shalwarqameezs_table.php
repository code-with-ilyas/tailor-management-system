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
        Schema::create('shalwarqameezs', function (Blueprint $table) {
            $table->id();
            $table->string('length');
            $table->string('kalor');
            $table->string('shoulder');
            $table->string('back_type');
            $table->string('back');
            $table->string('huf_type');
            $table->string('sleeves');
            $table->string('tira');
            $table->string('kalor_type');
            $table->string('shalwar_length');
            $table->string('pensa');
            $table->string('pocket_type');
            $table->string('daman_type');
            $table->string('chest');
            $table->string('daman');
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
        Schema::dropIfExists('shalwarqameezs');
    }
};
