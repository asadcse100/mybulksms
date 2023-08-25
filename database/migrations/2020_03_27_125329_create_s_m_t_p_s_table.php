<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSMTPSTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_t_p_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('host_name');
            $table->string('smtp_username');
            $table->string('smtp_password');
            $table->integer('smtp_port');
            $table->string('encryption_method');
            $table->string('defaut_from_email');
            $table->string('model_name');
            $table->integer('message_limit')->unsigned();
            $table->integer('sms_hit')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('s_m_t_p_s');
    }
}
