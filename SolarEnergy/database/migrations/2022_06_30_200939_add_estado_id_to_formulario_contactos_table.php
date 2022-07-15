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
        Schema::table('formulario_contactos', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_id')->unsigned()->nullable();
            $table->foreign('estado_id')->references('id')->on('tipo_estado')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formulario_contactos', function (Blueprint $table) {
            $table->dropColumn('estado_id')->unsigned()->nullable();
        });
    }
};
