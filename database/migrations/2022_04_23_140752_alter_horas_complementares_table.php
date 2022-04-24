<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migração para relacionamentos
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horas_complementares', function (Blueprint $table) {
            $table->unsignedBigInteger('id_aluno');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_aluno')->references('id')->on('users');
            $table->foreign('id_categoria')->references('id')->on('categorias');
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
