<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id')->unsigned();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');;
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->string('adr')->nullable();
            $table->string('shot_on')->nullable();
            $table->string('processor_completed_on')->nullable();
            $table->string('photographer_name')->nullable();
            $table->string('processor_name')->nullable();
            $table->string('link')->nullable();
            $table->string('embed_code')->nullable();
            $table->string('state')->nullable()->default('Incomplete');

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
        Schema::dropIfExists('tours');
    }
}
