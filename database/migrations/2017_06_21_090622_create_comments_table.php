<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->integer('user_id')->unsigned();
            $table->integer('discussion_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  //规定表的外键并实现联级删除
            $table->foreign('discussion_id')->references('id')->on('discussions')->onDelete('cascade');  //规定表的外键并实现联级删除

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
        Schema::drop('comments');
    }
}
