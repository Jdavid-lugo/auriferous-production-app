<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelHasPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('model_has_permissions', function(Blueprint $table)
		{
			$table->bigInteger('permission_id');
			$table->string('model_type', 191);
			$table->bigInteger('model_id');
			$table->index(['model_id','model_type']);
			$table->primary(['permission_id','model_id','model_type'], 'model_has_permissions_pkey');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('model_has_permissions');
	}

}
