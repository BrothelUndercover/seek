<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id',199)->index();
            $table->integer('ship_id')->nullable()->comment('套餐');
            $table->integer('user_id')->comment('会员');
            $table->integer('card_id')->comment('卡密');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->text('mark')->nullable()->commnet('备注');
            $table->timestamp('pay_time')->comment('激活时间/支付时间');
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
        Schema::dropIfExists('orders');
    }
}
