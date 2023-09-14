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
        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id_tarea');
            $table->string('nombre_tarea',50);
            $table->boolean('terminado')->default(false);
            // $table->timestamp('fecha_creacion')->nullable();
            // $table->timestamp('fecha_termino')->nullable();
            $table->dateTime('fecha_creacion')->nullable();
            $table->dateTime('fecha_termino')->nullable();
            $table->unsignedBigInteger('id_estatus')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();

            $table->foreign('id_estatus')
            ->references('id_estatus')
            ->on('estatus')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreign('id_usuario')
            ->references('id_usuario')
            ->on('usuarios')
            ->cascadeOnUpdate()
            ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
};
