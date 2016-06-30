<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip')->default('0.0.0.0');
            $table->string('page')->default('')->comment('访问页面');
            $table->integer('hit')->default(0)->comment('点击量');
            $table->timestamp('date')->default('0000-00-00 00:00:00')->comment('访问时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
