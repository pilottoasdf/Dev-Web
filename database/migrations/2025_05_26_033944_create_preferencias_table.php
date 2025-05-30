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
        Schema::create('preferencias', function (Blueprint $table) {
            $table->id();
            $table->boolean('peso_portugues')->default(false);
            $table->boolean('peso_matematica')->default(false);
            $table->boolean('peso_fisica')->default(false);
            $table->boolean('peso_quimica')->default(false);
            $table->boolean('peso_biologia')->default(false);
            $table->boolean('peso_historia')->default(false);
            $table->boolean('peso_geografia')->default(false);
            $table->boolean('peso_filosofia')->default(false);
            $table->boolean('peso_sociologia')->default(false);
            $table->boolean('peso_ingles')->default(false);
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();     
});
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferencias');
    }
};
