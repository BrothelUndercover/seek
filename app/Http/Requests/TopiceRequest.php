<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:8',
            'category_id' => 'required',
            'province'  => 'required',
            'city'  => 'required',
            'county'    => 'required',
            'consumer_price'    => 'required',
            'contact'   => 'required',
            'contact_address'   => 'required',
            'tab_ids'    => 'required',
            'body'  => 'required|min:30'
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => '用户名不能为空',
            'title.min:8'           => '标题最少6个字符',
            'category_id.required'  => '分类不能为空',
            'province.required'     => '省份不能为空',
            'city.required'         => '城市不能为空',
            'county.required'      => '邮箱已存在',
            'consumer_price.required'  => '价格不能为空',
            'contact.required'        => '联系方式不能空',
            'contact_address.required' => '联系地址不为空!',
            'tab_ids.required'          => '必须选择一个标签',
            'body.required'         => '描述不为空',
            'body.min:30'           => '描述最少20个字'
        ];
    }
}
