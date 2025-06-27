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
        Schema::create('progresso_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_quiz')->constrained('quizzes')->onDelete('cascade');
            $table->foreignId('id_usuario')->constrained('users')->onDelete('cascade');
            $table->integer('tentativas');
            $table->decimal('pontos', 5, 1);
            $table->boolean('trofeu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progresso_quizzes');
    }
};
