<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('标题');
            $table->string('excerpt')->nullable()->comment('摘要');
            $table->tinyInteger('province')->default('2')->comment('省');
            $table->tinyInteger('city')->nullable()->comment('市');
            $table->tinyInteger('county')->nullable()->comment('县/区');
            $table->string('ser_project')->comment('项目');
            $table->string('contact')->comment('联系');
            $table->string('consumer_price')->comment('消费详情');
            $table->text('body')->nullable()->comment('内容描述');
            $table->integer('user_id')->comment('发帖人');
            $table->integer('category_id')->comment('分类');
            $table->text('pictures')->nullable()->comment('图片集合');
            $table->integer('view_count')->default(0)->comment('浏览量');
            $table->integer('order')->default(0)->comment('排序');
            $table->boolean('is_hot')->default(false)->comment('热点');
            $table->integer('rating')->default(10)->commnet('好评星');
            $table->integer('comment_count')->default(0)->comment('评论数');
            $table->integer('follower_count')->default(0)->comment('关注量');
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
        Schema::dropIfExists('topices');
    }
}
