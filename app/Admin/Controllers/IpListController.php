<?php

namespace App\Admin\Controllers;

use App\IpList;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class IpListController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '白名单|黑名单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new IpList);

        $grid->column('id', __('编号'));
        $grid->column('ip', __('IP'));
        $grid->column('ip_type', __('类型'))->using([
            2 => '<span class="label label-danger">黑名单</span>',
            1 => '<span class="label label-success">白名单</span>',
        ])->help('后台登录白名单,前台申请黑名单');
        $grid->column('remark',__('备注'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->where(function ($query) {
                $query->where('ip', ip2long($this->input));
            }, 'Ip');

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
        $form = new Form(new IpList);

        $form->textarea('ip', __('IP/IPS'))->rows(10);
        $form->radio('ip_type', __('类型'))->options(['2' => '黑名单', '1'=> '白名单'])->default('2');
        $form->text('remark',__('备注'));

        return $form;
    }

    public function store()
    {
        $request = new Request;
        $data = $request::all();
        Validator::make($data,[
            'ip' => 'required',
        ],[
            'ip.requiredu' => 'IP/IPS不为空',
        ])->validate();
        $ips = explode(PHP_EOL, $data['ip']);
        $ip_type = $data['ip_type'];
        $remark = $data['remark'];
        foreach ($ips as $key => $value) {
            $value = trim($value);
            IpList::firstOrCreate(['ip' => ip2long($value), 'ip_type' => $ip_type,'remark'=>$remark]);
        }
    }

    public function update($id)
    {
        $request = new Request;
        $data = $request::all();
        IpList::where('id',$id)->update(['ip'=>ip2long($data['ip']),'ip_type'=>$data['ip_type'],'remark'=>$data['remark']]);
        return Redirect()->route('blank.ip-lists.index');
    }

}
