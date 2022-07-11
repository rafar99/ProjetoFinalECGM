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
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->text('descricao');
            $table->timestamp('dataCriacao')->useCurrent();
            $table->date('dataExecucao')->nullable();;
            $table->double('tempoExecucaoEmH')->nullable();;

            $table->unsignedBigInteger('tipoPainel')->unsigned()->nullable();
            $table->foreign('tipoPainel')->references('id')->on('tipo_painel')->onDelete('cascade');

            $table->unsignedBigInteger('tipoPedido')->unsigned()->nullable();
            $table->foreign('tipoPedido')->references('id')->on('tipo_pedido')->onDelete('cascade');

            $table->unsignedBigInteger('moradaPedido')->unsigned()->nullable();
            $table->foreign('moradaPedido')->references('id')->on('morada_pedido')->onDelete('cascade');

            $table->unsignedBigInteger('id_funcionario')->unsigned()->nullable();
            $table->foreign('id_funcionario')->references('id')->on('funcionario')->onDelete('cascade');

            $table->unsignedBigInteger('id_cliente')->unsigned()->nullable();
            $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');

            $table->unsignedBigInteger('estado')->unsigned()->nullable();
            $table->foreign('estado')->references('id')->on('tipo_estado')->onDelete('cascade');

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
        Schema::dropIfExists('pedido');
    }
};
