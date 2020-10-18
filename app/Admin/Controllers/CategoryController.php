<?php

namespace App\Admin\Controllers;

use App\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分类';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('序号'));
        $grid->column('name', __('分类名称'));
        $grid->column('icon',__('icon'));
        $grid->column('description', __('描述'));
        $grid->column('status', __('状态'))->switch();
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('name','分类名称');
        });
        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->text('name', __('分类名称'));
        $form->text('icon',__('Icon'));
        $form->text('description', __('描述'));
        $form->switch('status', __('状态'))->default(1);

        return $form;
    }
}
