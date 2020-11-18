<?php

namespace App\Admin\Controllers;

use App\Carousel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Topice;

class CarouselController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '跑马灯';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Carousel());

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'))->image();
        $grid->column('topice_id', __('帖子'))->display(function ($topiceid) {
            return Topice::find($topiceid)->title;
        });
        $grid->column('status', __('状态'))->switch();
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
        $form = new Form(new Carousel());

        $form->image('image', __('Image'));
        $form->select('topice_id', __('帖子'))->options(Topice::orderBy('created_at','desc')->pluck('title','id')->take(20));
        $form->switch('status', __('状态'))->default(1);
        return $form;
    }
}
