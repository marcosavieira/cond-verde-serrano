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
        Schema::create('lead_usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique(); // Chave única para o e-mail
            $table->string('telefone')->unique(); // Chave única para o telefone
            $table->string('estado');
            $table->string('cidade');
            $table->text('mensagem');
            $table->timestamp('data_criacao')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_usuario');
    }
};
