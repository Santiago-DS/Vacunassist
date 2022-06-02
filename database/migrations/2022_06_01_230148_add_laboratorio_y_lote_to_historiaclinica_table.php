<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLaboratorioYLoteToHistoriaclinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historiaclinica', function (Blueprint $table) {
            $table->unsignedBigInteger('id_laboratorio')->nullable();
            $table->foreign("id_laboratorio")
                ->references("id")
                ->on("laboratorios")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string('lote')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historiaclinica', function (Blueprint $table) {
            //
        });
    }
}
