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
            $table->string('nome');
            $table->string('contacto');
            $table->unsignedBigInteger('cod_utilizador')->unsigned()->nullable();
            $table->foreign('cod_utilizador')->references('id')->on('utilizador')->onDelete('cascade');

            $table->intiger('tipoFuncionario');

            $table->date('dataRegisto');
            $table->intiger('disponibilidade');

            $table->timestamps();

            $table->unsignedBigInteger('motorista_id')->unsigned()->nullable();

 $table->foreign('motorista_id')->references('id')->on('table_motorista')->onDelete('cascade');
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
