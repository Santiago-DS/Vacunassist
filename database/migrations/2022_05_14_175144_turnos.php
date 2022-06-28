<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Turnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vacuna');
            $table->unsignedBigInteger('id_zona');
            $table->unsignedBigInteger('id_paciente');
            $table->date("fecha");
            $table->date("hora");
            $table->enum("estado", ["aplicado", "cancelado", "ausente", "pendiente" , 'aprobacion'])->default("pendiente");
            $table->foreign("id_vacuna")
                ->references("id")
                ->on("vacunas")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreign("id_zona")
                ->references("id")
                ->on("zonas")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreign("id_paciente")
                ->references("id")
                ->on("users")
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
}
