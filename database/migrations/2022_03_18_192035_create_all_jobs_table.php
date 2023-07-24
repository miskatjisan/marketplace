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
		Schema::create('all_jobs', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('NO ACTION');
			$table->string('job_id')->nullable();
			$table->string('region_name')->nullable();
			$table->foreignId('main_category')->nullable()->references('id')->on('job_main_categories')->onDelete('NO ACTION');
			$table->foreignId('sub_category')->nullable()->references('id')->on('job_sub_categories')->onDelete('NO ACTION');
			$table->string('job_title')->nullable();
			$table->text('relative_file')->nullable();
			$table->text('specific_task')->nullable();
			$table->text('require_proof')->nullable();
			$table->text('thumbnail')->nullable();
			$table->integer('worker_need')->nullable();
			$table->double('each_worker_earn', 8, 2)->nullable();
			$table->integer('screenshot')->nullable();
			$table->integer('est_day')->nullable();
			$table->double('est_job_cost', 8, 2)->nullable();
			$table->double('admin_income', 8, 2)->nullable();
			$table->integer('job_status')->nullable();
			$table->timestamps();
			
			$table->index(['user_id', 'main_category', 'sub_category']);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists('all_jobs');
	}
};
