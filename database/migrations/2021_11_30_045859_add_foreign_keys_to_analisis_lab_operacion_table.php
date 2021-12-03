<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnalisisLabOperacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('analisis_lab_operacion', function(Blueprint $table)
		{
			$table->foreign('status_id', 'analisis_lab_operacion_status_id_fkey')->references('id')->on('status')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('analisis_laboratorio_id', 'analisis_lab_operacion_analisis_laboratorio_id_fkey')->references('id')->on('analisis_laboratorio')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('analisis_lab_operacion', function(Blueprint $table)
		{
			$table->dropForeign('analisis_lab_operacion_status_id_fkey');
			$table->dropForeign('analisis_lab_operacion_analisis_laboratorio_id_fkey');
		});
	}

}
