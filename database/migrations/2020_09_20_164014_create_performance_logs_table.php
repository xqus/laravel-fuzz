<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('request_method');
            $table->string('request_url');
            $table->string('request_path');
            $table->string('controller_action')->nullable();

            $table->unsignedInteger('response_code');
            $table->unsignedInteger('execution_time');
            $table->unsignedInteger('db_query_count');
            $table->unsignedInteger('db_execution_time');
            $table->unsignedInteger('models_count');
            $table->unsignedInteger('memory_peak');

            $table->timestamps();

            $table->index('request_path');
            $table->index('response_code');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_logs');
    }
}
