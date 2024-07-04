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
        Schema::table('termos', function (Blueprint $table) {
            $table->foreignId('situacao_termo_id')->default(2)->after('anexo')->constrained('situacao_termo');
            // after = criar a situacao_termo_id depois da campo modelo no banco.
            // constrained Criar o situacao_termo_id na tabela termos.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('termos', function (Blueprint $table) {
            $table->foreignId('situacao_termo_id');
        });
        // Esse serve para apagar a parte criada altomaticamente
    }
};
