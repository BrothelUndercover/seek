@extends('layouts.app')

@section('title','发布')

@section('styles')

@endsection
@section('content')
{{--     <div class="container in_top index">
        <div class="panel">
            <div class="col-lg-11 col-sm-11 col-xs-11">
                <p>发布真实小姐信息，经过审核后，管理员会根据您的信息内容质量在6种标准中给予金币奖励</p>
                <p>当其他人查看您的信息一次，所扣的金币将反馈到您账户</p>
                <p>金币的要求根据帖子内容的质量由管理员来决定。分别有5种信息标准标准【10金币 20金币 50金币 80金币 100金币】 </p>
            </div>
            <div id="editor-container" class="jumbotron content-lamp">

            </div>
        </div>
    </div> --}}
    <div class="container re_top re_ttop">
        <div class="contact_right col-lg-12 col-sm-12 in_top">
            <div class="panel">
                <div class="panel-heading re_to panel-recolor">
                    <span class="re_i col-lg-1 col-sm-1 col-xs-1">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    </span>
              {{--       <div class="col-lg-11 col-sm-11 col-xs-11">
                        <p>发布真实小姐信息，经过审核后，管理员会根据您的信息内容质量在6种标准中给予金币奖励</p>
                        <p>当其他人查看您的信息一次，所扣的金币将反馈到您账户</p>
                        <p>金币的要求根据帖子内容的质量由管理员来决定。分别有5种信息标准标准【10金币 20金币 50金币 80金币 100金币】 </p>
                    </div> --}}
                </div>
                <div class="panel-body re_mar_left">
                    <form action="{{ route('topices.store') }}" class="form-horizontal" enctype="multipart/form-data"  method="POST">
                        @csrf
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l"><b>*</b><span>标题:</span> </label>
                            <div class="col-sm-5 col-lg-5">
                                <input type="text" class="form-control input_line" id="title" name="title" placeholder="标题信息">
                            </div>
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label "><b>*</b><span>选择分类:</span> </label>
                            <div class="col-sm-5 col-lg-5 ">
                                <select class="form-control from_sel" id="info_type" name="category_id">
                                    <option value="1">111</option>
                                    <option value="2">222</option>
                                    <option value="3">333</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label "><b>*</b><span>地区选择:</span> </label>
                            <div class="col-sm-2 col-lg-2 ">
                                <select class="form-control from_sel" id="province" name="province">
                                    <option value="1">北京</option>
                                    <option value="2">天津</option>
                                    <option value="3">河北</option>
                                    <option value="4">山西</option>
                                    <option value="5">内蒙古</option>
                                    <option value="6">辽宁</option>
                                    <option value="7">吉林</option>
                                    <option value="8">黑龙江</option>
                                    <option value="9">上海</option>
                                    <option value="10">江苏</option>
                                    <option value="11">浙江</option>
                                    <option value="12">安徽</option>
                                    <option value="13">福建</option>
                                    <option value="14">江西</option>
                                    <option value="15">山东</option>
                                    <option value="16">河南</option>
                                    <option value="17">湖北</option>
                                    <option value="18">湖南</option>
                                    <option value="19">广东</option>
                                    <option value="20">广西</option>
                                    <option value="21">海南</option>
                                    <option value="22">重庆</option>
                                    <option value="23">四川</option>
                                    <option value="24">贵州</option>
                                    <option value="25">云南</option>
                                    <option value="26">西藏</option>
                                    <option value="27">陕西</option>
                                    <option value="28">甘肃</option>
                                    <option value="29">青海</option>
                                    <option value="30">宁夏</option>
                                    <option value="31">新疆</option>
                                    <option value="32">香港</option>
                                    <option value="33">澳门</option>
                                    <option value="34">台湾</option>
                                </select>
                            </div>
                            <div class="col-sm-2 col-lg-2 ">
                                <select class="form-control from_sel" id="city" name="city">
                                </select>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <select class="form-control from_sel" id="county" name="county">
                                </select>
                            </div>
                            <div class="col-sm-4 tips"></div>
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l">
                                <b>*</b><span>消费情况:</span>
                            </label>
                            <div class="col-sm-5 col-lg-5 col-xs-12">
                                <input type="text" class="form-control from_sel input_line" id="consumer_price" name="consumer_price" placeholder="300-500元">
                            </div>
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l">
                                <b>*</b><span>联系方式:</span>
                            </label>
                            <div class="col-sm-5 col-lg-5 col-xs-12">
                                <input type="text" class="form-control from_sel input_line" name="contact" id="contact" placeholder="QQ/微信/电话: 139XXXXXXXX">
                            </div>
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l">
                                <b>*</b><span>详细地址:</span>
                            </label>
                            <div class="col-sm-5 col-lg-5 col-xs-12">
                                <input type="text" class="form-control from_sel input_line" id="contact_address" name="contact_address" placeholder="xx路,休闲会所">
                            </div>
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l"><b>*</b><span>选择标签:</span> </label>
                            <div class="col-sm-9 col-lg-9 col-xs-12 checkbox_p">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="service_type2" name="service_type" value="xxx"> 123
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="service_type6" name="service_type" value="xxx"> 456
                                </label>
                            </div>
                        </div>

                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l"><b>*</b><span>细节描述:</span> </label>
                            <div class="col-lg-10 col-xs-12">
                                <div id="editor-container">

                                </div>
                            </div>
                            <textarea name="body" hidden="hidden" id="area_body"></textarea>
                        </div>
                        <button type="submit" id="topiceButton" class="btn btn-rele">发布</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    const editor = new E('#editor-container')
    editor.config.placeholder = '细节描述请阐述真实过程，字数不得少于50个字。字数越多，图片质量越好，管理员审核后所标价的金币越高'
    editor.config.uploadImgServer = '{{ route('topices.uploade_image') }}'
    editor.config.uploadImgMaxSize = 2 * 1024 * 1024
    editor.config.uploadImgMaxLength = 5
    editor.config.uploadFileName = 'tower_picture'
    editor.config.height = 500
    editor.config.uploadImgParams = {
        _token: '{{ csrf_token() }}',
    }
    editor.config.uploadImgHooks = {
        success: function(xhr){

        },
        fail: function(xhr,editor,resData){

        },
        error: function(xhr,editor,resData){

        },
        //上传成功的图片插入编辑器
        customInsert: function(insertImgFn,result){
            console.log(result)
            insertImgFn(result.data['path'])
        }
    }
    editor.config.onchange = function (newHtml) {
        $('#area_body').val(newHtml)
    }
    editor.create()
</script>
@endsection


