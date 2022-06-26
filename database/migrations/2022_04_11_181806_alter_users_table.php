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

    // Criado uma tabela de cursos e adicionando mais duas colunas na tabela de usuário
    public function up()
    {
        Schema::create('curso', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->integer('carga_prevista');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('prontuario');
            $table->unsignedBigInteger('id_curso');
            $table->string('funcao')->default('aluno');
            $table->foreign('id_curso')->references('id')->on('curso');
        });

        DB::table('curso')->insert([
            ['name' => 'Análise e desenvolvimento de sistemas', 'carga_prevista' => 42],
            ['name' => 'Engenharia de Controle e Automação', 'carga_prevista' => 0],
            ['name' => 'Tecnologia em Automação Industrial', 'carga_prevista' => 0],
            ['name' => 'Licenciatura em Matemática', 'carga_prevista' => 200]
        ]);
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
