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
        $data = app('captcha')->create('flat',true);
        dd($data);
        return $this->response->array($data);
        // Cache::forget($request->captcha_key);
    }
}
