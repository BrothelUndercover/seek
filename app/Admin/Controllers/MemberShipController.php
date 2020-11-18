<?php

namespace App\Admin\Controllers;

use App\Membership;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MemberShipController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '会员';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Membership());

        $grid->column('id', __('序号'));
        $grid->column('viptype_name', __('会员类型'));
        $grid->column('price', __('价格(元)'));
        $grid->column('description', __('描述'));
        $grid->column('cardurl', __('发卡地址'))->editable();
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));

        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Membership());

        $form->text('viptype_name', __('会员类型'));
        $form->decimal('price', __('价格'))->default(0.00);
        $form->decimal('cardurl', __('发卡地址'));
        $form->text('description', __('描述'));

        return $form;
    }
}
