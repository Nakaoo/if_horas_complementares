<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (BLueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('descricao');
            $table->integer('carga_min');
            $table->integer('carga_max');
            $table->integer('carga_total');
            $table->unsignedBigInteger('id_documento');
            $table->foreign('id_documento')->references('id')->on('documentos');
            $table->timestamps();
        });

        DB::table('documentos')->insert([
            ['name' => 'Certificados'],
            ['name' => 'Seminarios e palestra'],
        ]);

        DB::table('categorias')->insert([
            [
                'name' => 'Cursos externos',
                'descricao' => 'Cursos realizados em plataformas externas',
                'carga_min' => 2,
                'carga_max' => 20,
                'carga_total' => 40,
                'id_documento' => 1
            ],
            [
                'name' => 'Workshops',
                'descricao' => 'Workshops de atividades extracurriculares',
                'carga_min' => 2,
                'carga_max' => 20,
                'carga_total' => 40,
                'id_documento' => 2
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('documentos');
    }
};
