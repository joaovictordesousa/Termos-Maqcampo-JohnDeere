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
        Schema::create('termos', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('filial');
            $table->string('cpf');
            $table->string('serie');
            $table->string('auxaparelho');
            $table->string('modelo');
            $table->string('anexo')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termos');
    }
};
