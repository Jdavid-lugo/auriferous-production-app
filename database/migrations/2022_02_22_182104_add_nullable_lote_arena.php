<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableLoteArena extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lote_arena', function (Blueprint $table) {
		    $table->decimal('toneladas_humedad', 10, 3)->nullable()->change();
			$table->decimal('toneladas_seca', 10, 3)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lote_arena', function (Blueprint $table) {
            $table->decimal('toneladas_humedad', 8,8);
            $table->decimal('toneladas_seca', 8,8);
        });
    }
}
