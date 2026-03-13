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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('city');
            $table->integer('height');
            $table->integer('weight');
            $table->string('bio');
            $table->string('hobby');
            $table->string('tribe');
            $table->string('skin_color');
            $table->string('disease_history');
            $table->string('marital_status');
            $table->integer('children_count');
            $table->string('status');
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
