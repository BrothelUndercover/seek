<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->commnet('用户名');
            $table->string('password');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('mobile')->nullable()->unique()->comment('手机号');
            $table->string('avatar')->comment('头像');
            $table->tinyInteger('user_status')->default(1)->commnet('会员状态');
            $table->integer('credit')->default(0)->commnet('积分');
            $table->tinyInteger('vip_type')->default(0)->comment('会员类型');
            $table->timestamp('vip_expire_at')->nullable()->comment('会员到期时间');
            $table->timestamp('last_actived_at')->comment('最后登录期时间');
            $table->text('introdction')->nullable()->comment('简介');
            $table->string('sharecode')->comment('分享码');
            $table->integer('notification_count')->default(0)->comment('未读消息数');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
