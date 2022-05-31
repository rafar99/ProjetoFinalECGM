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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('morada',100);
            $table->string('contacto',100);
            $table->integer('nif');
            $table->date('dataRegisto');

            $table->unsignedBigInteger('tipoCliente')->unsigned()->nullable();
            $table->foreign('tipoCliente')->references('id')->on('tipo_cliente')->onDelete('cascade');

            $table->unsignedBigInteger('cod_utilizador')->unsigned()->nullable();
            $table->foreign('cod_utilizador')->references('id')->on('utilizador')->onDelete('cascade');

            $table->unsignedBigInteger('disponibilidade')->unsigned()->nullable();
            $table->foreign('disponibilidade')->references('id')->on('disponibilidade')->onDelete('cascade');

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
        Schema::dropIfExists('cliente');
    }
};
