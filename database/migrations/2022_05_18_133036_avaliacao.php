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
    public function up()
    {

        Schema::create('status', function (BLueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('avaliacao', function (BLueprint $table) {
            $table->id();
            $table->string('feedback');
            $table->integer('carga_horaria');
            $table->unsignedBigInteger('id_status');
            $table->unsignedBigInteger('id_avaliador');
            $table->unsignedBigInteger('id_horas');
            $table->foreign('id_status')->references('id')->on('status');
            $table->foreign('id_horas')->references('id')->on('horas_complementares');
            $table->foreign('id_avaliador')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('horas_complementares', function (Blueprint $table) {
            $table->unsignedBigInteger('id_avaliacao');
            $table->foreign('id_avaliacao')->references('id')->on('avaliacao');
        });

        DB::table('status')->insert([
            ['name' => 'Pendente'],
            ['name' => 'Aprovado'],
            ['name' => 'Rejeitado'],
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
