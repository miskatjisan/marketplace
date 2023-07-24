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
		Schema::create('all_job_countries', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('NO ACTION');
			$table->foreignId('job_id')->nullable()->references('id')->on('all_jobs')->onDelete('NO ACTION');
			$table->foreignId('country_id')->nullable()->references('id')->on('region_countries')->onDelete('NO ACTION');
			$table->string('country_name')->nullable();
			$table->timestamps();
			
			$table->index(['user_id', 'job_id', 'country_id']);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists('all_job_countries');
	}
};
