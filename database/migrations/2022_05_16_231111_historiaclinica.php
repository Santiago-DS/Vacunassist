<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Historiaclinica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiaclinica', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->date("fecha");
            $table->unsignedBigInteger('id_vacuna');
            $table->foreign("id_vacuna")
                ->references("id")
                ->on("vacunas")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreign("id_paciente")
                ->references("id")
                ->on("users")
                ->onDelete("cascade")
                ->onUpdate("cascade");
                $table->timestamps();
        //
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
