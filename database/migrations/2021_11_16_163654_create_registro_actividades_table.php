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
			$table->string('url');
			$table->string('descripcion')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('registro_actividades');
	}

}
