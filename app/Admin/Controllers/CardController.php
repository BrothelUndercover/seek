<?php

namespace App\Admin\Controllers;

use App\Card;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Admin\Actions\Card\ReleaseSecret;
use App\Membership;

class CardController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '卡密';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Card());

        $grid->column('id', __('ID'));
        $grid->column('secret', __('秘钥'));
        $grid->column('ship_id',__('套餐'))->display(function($ship_id){
            return Membership::find($ship_id)->viptype_name;
        });
        $grid->column('status', __('状态'))->using(['1'=> '已使用','0'=>'未使用'])->label([1=>'success',0=>'default']);
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

        $grid->tools(function (Grid\Tools $tools) {
            $tools->append(new ReleaseSecret());
        });
        $grid->disableActions();
        $grid->disableCreateButton();
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->equal('ship_id','套餐')->select(Membership::pluck('viptype_name','id'));
            // 在这里添加字段过滤器
            $filter->equal('status', '状态')->select(['1'=> '已使用','0'=>'未使用']);

        });

        return $grid;
    }
}
