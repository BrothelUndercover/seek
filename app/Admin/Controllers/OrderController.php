<?php

namespace App\Admin\Controllers;

use App\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Membership;
use App\User;
use App\Card;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'))->sortable()->totalRow('合计');
        $grid->column('order_id', __('订单号'));
        $grid->column('ship_id', __('套餐'))->display(function($ship_id){
            return  Membership::find($ship_id)->viptype_name;
        });
        $grid->column('amount',__('金额'))->totalRow(function ($amount) {
            return "<span class='text-danger text-bold'><i class='fa fa-yen'></i>{$amount} 元</span>";
        });
        $grid->column('user_id', __('会员'))->display(function($user_id){
            return User::find($user_id)->name;
        });
        $grid->column('card_id', __('卡密'))->display(function($card_id){
            return Card::find($card_id)->secret;
        });
        $grid->column('status', __('状态'))->using(['0'=>'失败','1'=>'成功'])->label([0 =>'danger',2=>'success']);
        $grid->column('mark', __('备注'))->editable();
        $grid->column('pay_time', __('支付时间'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));
        $grid->disableCreateButton();
        $grid->disableActions();
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('order_id','订单号');
            $filter->equal('ship_id','套餐')->select(Membership::pluck('viptype_name','id'));
            $filter->equal('user_id','会员');
            $filter->equal('card_id','卡密');
            $filter->like('mark','备注');
            $filter->between('created_at','创建时间')->datetime();
        });
        return $grid;
    }
}
