<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use App\Transformers\UserTransformer;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use JWTAuth;
/**
 * @Resource("Users")
 */
class UserController extends BaseController
{
    /**
     *  用户注册
     *  @Post("api/register")
     *  @Versions({"v1"})
     *  @Transaction({
     *      @Request({"name":"text","email":"test@gmail.com","password":"password"},headers={"Accept":"application/prs.seek.v1+json"}),
     *      @Response(200,body={"id":1,"name":"test"}),
     *      @Response(422,body={"error":{"message":{"422 Unprocessable Entity","errors":"name/email/password验证失败"}}})
     *  })
     */
    public function register(UserRequest $request)
    {
        // if (!captcha_api_check($request['captcha'],$request['key'])) {
        //     return $this->response->errorUnauthorized('验证码错误');
        // }
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => bcrypt($request->password),
            'last_actived_at' => Carbon::now()->toDateTimeString(),
            'sharecode'       => Str::random(6)
        ]);

        return $this->response->created($user);
    }

    public function user(UserTransformer $transformer)
    {
        return $this->response->item(auth('api')->user(),$transformer);
    }
}
