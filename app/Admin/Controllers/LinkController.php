<?php

namespace App\Admin\Controllers;

use App\Link;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LinkController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '友情链接';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Link());

        $grid->column('id', __('编号'));
        $grid->column('title', __('标题'));
        $grid->column('img', __('logo'))->display(function($img){
            return '<img width="80" src='.env('APP_URL').'/'.$img.'>';
        });
        $grid->column('link', __('地址link'));
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
        $form = new Form(new Link());

        $form->text('title', __('标题'));
        $form->image('img', __('Logo'));
        $form->url('link', __('Link地址'));

        return $form;
    }
}
