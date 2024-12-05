<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToOfertasEducativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofertas_educativas', function (Blueprint $table) {
            $table->string('imagen')->nullable()->after('mapa_curricular'); // Agregar campo para imágenes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ofertas_educativas', function (Blueprint $table) {
            $table->dropColumn('imagen'); // Eliminar el campo si se revierte la migración
        });
    }
}
