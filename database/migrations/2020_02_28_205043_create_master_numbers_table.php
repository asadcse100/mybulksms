<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterNumbersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('message_id')->unsigned()->nullable();
            $table->integer('country');
            $table->string('number')->unique();
            $table->integer('messageLimit')->nullable();
            $table->integer('messageRotation');            
            $table->integer('sms_hit')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('message_id')->references('id')->on('messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('master_numbers');
    }
}
