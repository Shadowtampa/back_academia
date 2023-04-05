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
        Schema::create('exercicio_treino', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        
            $table->unsignedBigInteger('treino_id');
            $table->foreign('treino_id')->references('id')->on('treinos');
            $table->unsignedBigInteger('exercicio_id');
            $table->foreign('exercicio_id')->references('id')->on('exercicios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_meta_data');
    }
};
