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
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como BIGINT AUTO_INCREMENT
            $table->string('client'); // Nome do cliente
            $table->string('researcher'); // Nome do pesquisador
            $table->string('title'); // Título do relatório
            $table->string('vulnerability_type'); // Tipo de vulnerabilidade
            $table->text('description'); // Descrição detalhada
            $table->string('severity'); // Nível de severidade
            $table->string('status'); // Status do relatório
            $table->string('image')->nullable(); // Caminho ou URL para a imagem (opcional)
            $table->timestamps(); // Cria created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
