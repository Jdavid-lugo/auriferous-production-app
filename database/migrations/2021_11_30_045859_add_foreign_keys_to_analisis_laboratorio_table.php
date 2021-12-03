<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnalisisLaboratorioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('analisis_laboratorio', function(Blueprint $table)
		{
			$table->foreign('analisis_id', 'analisis_laboratorio_analisis_id_fkey')->references('id')->on('analisis')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('analisis_laboratorio', function(Blueprint $table)
		{
			$table->dropForeign('analisis_laboratorio_analisis_id_fkey');
		});
	}

}
