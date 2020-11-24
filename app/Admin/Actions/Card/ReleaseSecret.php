<?php

namespace App\Admin\Actions\Card;

use Encore\Admin\Actions\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Card;
use App\Membership;

class ReleaseSecret extends Action
{
    public $name = '生成卡密';

    protected $selector = '.release-secret';

    public function handle(Request $request)
    {
        $number = $request->number;
        $identifier = Membership::find($request->ship_id)->identifier;
        for ($i=0; $i <$number ; $i++) {
            Card::firstOrCreate(['secret' => $identifier.'-'.Str::uuid(),'ship_id'=> $request->ship_id,]);
        }
        return $this->response()->success('成功')->refresh();
    }

     public function form()
    {
        $this->select('ship_id','套餐')->options(Membership::pluck('viptype_name','id'))->rules('required');
        $this->text('number', '生成数量')->rules('required');
    }

    public function html()
    {
        return <<<HTML
        <a class="btn btn-sm btn-success release-secret">生成秘钥</a>
HTML;
    }
}
