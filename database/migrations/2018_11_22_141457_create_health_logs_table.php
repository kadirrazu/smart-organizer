<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('log_date');
            $table->time('log_time');
            $table->boolean('bp')->default(0);
            $table->string('sys', 10)->nullable();
            $table->string('dia', 10)->nullable();
            $table->boolean('hr')->default(0);
            $table->string('h_rate', 10)->nullable();
            $table->boolean('wt')->default(0);
            $table->string('weight', 10)->nullable();
            $table->boolean('lp')->default(0);
            $table->string('lp_details', 100)->nullable();
            $table->boolean('bs')->default(0);
            $table->text('bs_details')->nullable();
            $table->boolean('creatinine')->default(0);
            $table->string('creatinine_details', 10)->nullable();
            $table->boolean('cbc')->default(0);
            $table->text('cbc_details')->nullable();
            $table->boolean('others')->default(0);
            $table->text('others_details')->nullable();
            $table->boolean('comments')->default(0);
            $table->text('comments_details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_logs');
    }
}
