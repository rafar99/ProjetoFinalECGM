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
        Schema::create('formulario_contactos', function (Blueprint $table) {
            $table->id();
            $table ->string('nome',200);
            $table ->string('email',200);
            $table ->string('assunto',200);
            $table ->text('mensagem');
            $table ->date('data');
            $table->timestamp('data')->useCurrent();
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
        Schema::dropIfExists('formulario_contactos');
    }
};
