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
            $table->integer('peso_portugues')->default(false);
            $table->integer('peso_matematica')->default(false);
            $table->integer('peso_fisica')->default(false);
            $table->integer('peso_quimica')->default(false);
            $table->integer('peso_biologia')->default(false);
            $table->integer('peso_historia')->default(false);
            $table->integer('peso_geografia')->default(false);
            $table->integer('peso_filosofia')->default(false);
            $table->integer('peso_sociologia')->default(false);
            $table->integer('peso_ingles')->default(false);
            $table->foreignId('id_usuario')->constrained('users')->onDelete('cascade');
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
