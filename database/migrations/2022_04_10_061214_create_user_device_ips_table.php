<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up ()
	{
		\Illuminate\Support\Facades\DB::statement('set foreign_key_checks=0');
		Schema::create('user_device_ips', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('NO ACTION');
			$table->string('device_ip')->nullable();
			$table->string('login_device')->nullable();
			$table->timestamps();
			
			$table->index(['user_id', 'device_ip']);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists('user_device_ips');
	}
};
