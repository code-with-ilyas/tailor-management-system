<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()

    {
        Schema::create('shalwar_kameez', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('length', 8, 2);
            $table->string('collar');
            $table->decimal('shoulder', 8, 2);
            $table->string('back_type'); // changed to string as it represents a type
            $table->decimal('back', 8, 2);
            $table->string('cuff_type'); // changed to string as it represents a type
            $table->decimal('sleeves', 8, 2);
            $table->decimal('chest', 8, 2);
            $table->string('bottom_collar_type'); // changed to string as it represents a type
            $table->string('shalwar_type'); // changed to string as it represents a type
            $table->decimal('pensa', 8, 2);
            $table->string('pocket_type'); // changed to string as it represents a type
            $table->string('bottom_type'); // changed to string as it represents a type
            $table->decimal('bottom', 8, 2);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('shalwar_kameez');
    }
};
