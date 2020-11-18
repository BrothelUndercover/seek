<?php

namespace App\Admin\Controllers;

use App\Tab;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TabController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tab';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tab());

        $grid->column('id', __('编号'));
        $grid->column('tabname', __('名称'));
        $grid->column('status', __('状态'))->switch();

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Tab());

        $form->text('tabname', __('名称'));
        $form->switch('status', __('状态'))->default(1);

        return $form;
    }
}
