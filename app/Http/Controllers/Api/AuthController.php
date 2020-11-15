<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
/**
 * @Resource("Users")
 */
class AuthController extends BaseController
{
    public function __construct()
    {
        $this->middleware('jwt.auth',['except'=> ['login']]);
    }

    /**
     *登录
     */
    public function login(Request $request)
    {
        $credentials = $request->only('name','password');

        if (! $token = auth('api')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码不正确');
        }
        return $this->responseWithToken($token);
    }
     /**
     * 注销
     *
     */
    public function logout()
    {
        auth('api')->logout();
        return $this->response->array(['message'=>'注销成功','status_code'=>204]);
    }
    /**
     * token 刷新
     *
     */
    public function refresh()
    {
        return $this->responseWithToken(auth('api')->refresh());
    }


    protected function responseWithToken($token)
    {
        return $this->response->array([
            'token' => $token,
            'token_type'   => 'bearer',
            'expires_at'   => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
