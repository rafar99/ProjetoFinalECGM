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
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('contacto',100);
            $table->date('dataRegisto');

            $table->unsignedBigInteger('cod_utilizador_id')->unsigned()->nullable();
            $table->foreign('cod_utilizador_id')->references('id')->on('utilizador')->onDelete('cascade');

            $table->unsignedBigInteger('tipoFuncionario_id')->unsigned()->nullable();
            $table->foreign('tipoFuncionario_id')->references('id')->on('tipo_funcionario')->onDelete('cascade');

            $table->unsignedBigInteger('disponibilidade_id')->unsigned()->nullable();
            $table->foreign('disponibilidade_id')->references('id')->on('disponibilidade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario');
    }
};
