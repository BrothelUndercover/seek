<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class CaptchaController extends BaseController
{

    /**
     * 获取图片验证码
     */
    public function captcha()
    {
        $captcha = app('captcha')->create('flat',true);

        return $this->response->array(['data'=> ['sensitive'=> $captcha['sensitive'],'key'=> $captcha['key'],'img'=>$captcha['img']]]);
    }
}
