<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroActividadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registro_actividades', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('accion_id');
			$table->integer('user_id');
			$table->string('url', 191);
			$table->string('descripcion', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registro_actividades');
	}

}
