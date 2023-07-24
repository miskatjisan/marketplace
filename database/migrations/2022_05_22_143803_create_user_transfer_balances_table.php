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
		Schema::create('user_transfer_balances', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('NO ACTION');
			$table->foreignId('receiver_id')->nullable()->references('id')->on('users')->onDelete('NO ACTION');
			$table->double('transfer_amount', 8, 2)->nullable();
			$table->timestamp('transfer_date')->nullable();
			$table->integer('status')->nullable();
			$table->timestamps();
			
			$table->index(['user_id', 'receiver_id']);
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down ()
	{
		Schema::dropIfExists('user_transfer_balances');
	}
};
