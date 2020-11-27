<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Membership;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MemberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    protected $vipType = [];


    public function __construct(){
        $this->vipType = Membership::pluck('viptype_name','id')->toArray()+[0 => '非会员'];
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('序号'))->sortable();
        $grid->column('name', __('用户名'));
        $grid->column('email', __('邮箱'));
        $grid->column('mobile', __('手机号'));
        $grid->column('avatar', __('头像'))->display(function($avatar){
            return "<img height=45 width=45  src=".$avatar.">";
        });
        $grid->column('user_status', __('用户状态'))->bool();
        $grid->column('credit', __('积分'));
        $grid->column('vip_type', __('会员类型'))->using($this->vipType)->label([1=>'success',2=>'success',3=>'success']);
        $grid->column('vip_expire_at', __('会员到期时间'))->display(function($vip_expire_at){
            if ($this->vip_type > 0) {
               return $vip_expire_at;
            }
            return '';
        });
        $grid->column('last_actived_at', __('最后登录时间'));
        $grid->column('sharecode', __('分享码'));
        $grid->column('notification_count', __('未读消息'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('更新时间'));
        $grid->filter(function (Grid\Filter $filter) {
            $filter->equal('id','序号');
            $filter->equal('name','用户名');
            $filter->equal('email','邮箱');

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('序号'));
        $show->field('name', __('用户名'));
        $show->field('email', __('邮箱'));
        $show->field('mobile', __('手机号'));
        $show->field('avatar', __('头像'));
        $show->field('user_status', __('用户状态'));
        $show->field('credit', __('积分'));
        $show->field('vip_type', __('会员类型'));
        $show->field('vip_expire_at', __('会员到期时间'));
        $show->field('last_actived_at', __('最后登录时间'));
        $show->field('introdction', __('简介'));
        $show->field('sharecode', __('分享码'));
        $show->field('notification_count', __('未读消息'));
        $show->field('email_verified_at', __('邮箱验证时间'));
        $show->field('remember_token', __('记住token'));
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
        $form = new Form(new User());

        $form->text('name', __('用户名'));
        $form->password('password', __('密码'));
        $form->email('email', __('邮箱'));
        $form->mobile('mobile', __('手机号'));
        $form->image('avatar', __('头像'));
        $form->switch('user_status', __('用户状态'))->default(1);
        $form->number('credit', __('积分'))->default(0);
        $form->select('vip_type')->options($this->vipType);
        $form->datetime('vip_expire_at', __('会员到期时间'))->default(date('Y-m-d H:i:s'));
        $form->textarea('introdction', __('简介'));
        $form->text('sharecode', __('分享码'))->value(Str::random(6));
        $form->datetime('last_actived_at', __('最后登录时间'))->default(date('Y-m-d H:i:s'));
        $form->number('notification_count', __('未读消息'))->default(0);
        $form->datetime('email_verified_at', __('邮箱验证时间'))->default(date('Y-m-d H:i:s'));
        $form->saving(function(Form $fm){
            $fm->password = bcrypt($fm->password);
        });
        return $form;
    }
}
