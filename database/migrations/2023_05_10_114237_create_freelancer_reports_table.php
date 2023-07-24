<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement('set foreign_key_checks=0');
        Schema::create('freelancer_reports', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('NO ACTION');
			$table->foreignId('buyer_id')->nullable()->references('user_id')->on('all_jobs')->onDelete('NO ACTION');
			$table->foreignId('job_id')->nullable()->references('id')->on('all_jobs')->onDelete('NO ACTION');
			$table->string('report_type');
			$table->text('report_summery')->nullable();
			$table->timestamps();
			
			$table->index(['user_id', 'job_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelancer_reports');
    }
};
