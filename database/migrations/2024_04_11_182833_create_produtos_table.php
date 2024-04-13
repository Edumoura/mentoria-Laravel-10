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
        Schema::create('produtos', function (Blueprint $table) {
            //->nullabel() para casos em que o campo não é obrigatório
            $table->id();
            $table->string('nome');
            $table->decimal('valor', 10, 2);
            $table->timestamps(); //create -> coloca o timestamp da criação //Update coloca o timestamp da atualização
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
