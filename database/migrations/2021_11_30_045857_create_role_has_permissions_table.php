<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleHasPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_has_permissions', function(Blueprint $table)
		{
			$table->bigInteger('permission_id');
			$table->bigInteger('role_id');
			$table->primary(['permission_id','role_id'], 'role_has_permissions_pkey');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_has_permissions');
	}

}
