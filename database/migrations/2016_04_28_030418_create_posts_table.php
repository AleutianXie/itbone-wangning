<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        slug：将文章标题转化为URL的一部分，以利于SEO
//        title：文章标题
//        content：文章内容
//        published_at：文章正式发布时间
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category');
            $table->integer('tags');
            $table->string('imgurl');
            $table->string('title');
            $table->string('listimgurl');
            $table->string('titleimgurl');
            $table->text('content');
            $table->enum('status',['y','n']);
            $table->integer('hit')->comment('点击量');
            $table->timestamps();
            $table->timestamp('published_at')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
