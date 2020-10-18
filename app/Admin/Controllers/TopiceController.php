<?php

namespace App\Admin\Controllers;

use App\Topice;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\City;
use App\Category;
use App\User;

class TopiceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '帖子';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Topice());

        $grid->quickSearch('title','excerpt','ser_project','city','county','province');
        // $grid->fixColumns(3);
        $grid->column('id', __('序号'))->sortable();
        $grid->column('title', __('标题'));
        $grid->column('excerpt', __('摘要'));
        $grid->column('province', __('省'))->display(function ($provinceid) {
            return City::find($provinceid)->name;
        });
        $grid->column('city', __('市'))->display(function ($cityid) {
            return City::find($cityid)->name;
        });
        $grid->column('county', __('县/区'))->display(function ($countyid) {
            return City::find($countyid)->name;
        });
        $grid->column('ser_project', __('服务项目'));
        $grid->column('contact', __('联系'));
        $grid->column('consumer_price', __('消费介绍'));
        $grid->column('body', __('具体描述'))->hide();
        $grid->column('user_id', __('发帖人'))->display(function($userid){
            return User::find($userid)->name;
        });
        $grid->column('category_id', __('分类'))->display(function ($catid) {
            return Category::find($catid)->name;
        });
        $grid->column('pictures', __('照片集'))->carousel(100,60);
        $grid->column('view_count', __('浏览量'));
        $grid->column('order', __('排序'))->editable();
        $grid->column('is_hot', __('是否热点'))->switch();
        $grid->column('rating', __('星级好评'))->editable();
        $grid->column('comment_count', __('评论数'));
        $grid->column('follower_count', __('关注数'));
        $grid->column('created_at', __('创建时间'));
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('title','标题');
            $filter->equal('category_id','分类')->select(Category::pluck('id','name'));
            $filter->like('body','描述');
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Topice::findOrFail($id));

        $show->panel()->style('info')->title('帖子基本信息...');
        $show->field('id', __('编号'));
        $show->field('title', __('标题'));
        $show->field('excerpt', __('摘要'));
        $show->field('province', __('省份'))->as(function($provinceid){
            return City::find($provinceid)->name;
        });
        $show->field('city', __('城市'))->as(function($cityid){
            return City::find($cityid)->name;
        });
        $show->field('county', __('县/区'))->as(function($countyid){
            return City::find($countyid)->name;
        });
        $show->field('ser_project', __('服务项目'));
        $show->field('contact', __('联系'));
        $show->field('consumer_price', __('价格详情'));
        $show->field('body', __('Body'))->unescape()->as(function ($content) {
            return "<pre>{$content}</pre>";
        });
        $show->field('user_id', __('发帖人'))->as(function($userid){
            return City::find($userid)->name;
        });
        $show->field('category_id', __('分类'))->as(function($catid){
            return City::find($catid)->name;
        });
        $show->field('pictures', __('图片'))->carousel();
        $show->field('view_count', __('浏览量'));
        $show->field('order', __('排序'));
        $show->field('is_hot', __('是否热点'))->using(['1' => '是', '0' => '否']);
        $show->field('rating', __('Rating'))->label();
        $show->field('comment_count', __('评论数'));
        $show->field('follower_count', __('关注量'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Topice());

        $form->text('title', __('标题'));
        $form->text('excerpt', __('摘要'));
        $form->select('category_id', __('分类'))->options(Category::where('status',true)->pluck('name','id'))->rules('required');
        $form->select('user_id', __('发帖人'))->options(User::pluck('name','id'));
        $form->select('province','省份')->options(City::where('deep',1)->pluck('name','id'))->load('city','/api/city')->rules('required');
        $form->select('city','城市')->options(function($id){
            return City::where('id',$id)->pluck('name','id');
        })->load('county','/api/county')->rules('required');
        $form->select('county','县/区')->options(function($id){
            return City::where('id',$id)->pluck('name','id');
        })->rules('required');
        $form->text('ser_project', __('服务项目'));
        $form->text('contact', __('联系'));
        $form->text('consumer_price', __('消费介绍'));
        $form->number('order', __('排序'))->default(0);
        $form->radio('is_hot', __('是否热点'))->options([0 => '否', 1=> '是'])->default(1);
        $form->number('rating', __('星级好评'))->default(10);
        $form->simplemde('body', __('具体描述'))->height(300);
        $form->multipleImage('pictures', __('照片集'))->sortable()->removable();

        return $form;
    }
}
