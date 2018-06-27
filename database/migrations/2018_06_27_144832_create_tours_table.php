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
            $table->integer('user_id')->unsigned();
            $table->string('adr')->nullable();
            $table->string('shotOn')->nullable();
            $table->string('processorCompletedOn')->nullable();
            $table->string('photographerName')->nullable();
            $table->string('processorName')->nullable();
            $table->string('link')->nullable();
            $table->string('embedCode')->nullable();
            $table->string('state')->nullable();

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
