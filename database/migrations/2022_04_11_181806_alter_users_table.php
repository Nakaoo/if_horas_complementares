<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // Adicionando mais duas colunas na tabela de usuário
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('prontuario');
            $table->string('curso');
            $table->string('funcao')->default('aluno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
