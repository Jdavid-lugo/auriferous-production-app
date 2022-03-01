<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update3DatatypeValorToAnalisisLaboratorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisis_laboratorio', function (Blueprint $table) {
            $table->decimal('valor', 12, 3)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analisis_laboratorio', function (Blueprint $table) {
            $table->decimal('valor', 8, 3)->change();
        });
    }
}
