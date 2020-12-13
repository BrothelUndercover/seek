@extends('layouts.app')

@section('title','发布')

@section('styles')

@endsection
@section('content')
    <div class="container re_top re_ttop">
        <div class="contact_right col-lg-12 col-sm-12 in_top">
            <div class="panel">

                <div class="panel-heading re_to panel-recolor">
                    <span class="re_i col-lg-1 col-sm-1 col-xs-1">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                    </span>
                    <div class="col-lg-11 col-sm-11 col-xs-11">
                        <p>发布真实小姐信息，经过审核后，管理员会根据您的信息内容质量后给以奖励</p>
                    </div>
                </div>
                <div class="panel-body re_mar_left">
                    <form action="{{ route('topices.store') }}" class="form-horizontal" enctype="multipart/form-data"  method="POST">
                        @csrf
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l"><b>*</b><span>标题:</span> </label>
                            <div class="col-sm-5 col-lg-5">
                                <input type="text" class="form-control input_line @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" name="title" placeholder="标题信息">
                            </div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label "><b>*</b><span>选择分类:</span> </label>
                            <div class="col-sm-5 col-lg-5 ">
                                <select class="form-control from_sel @error('category_id') is-invalid @enderror" id="info_type" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                              @enderror
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label "><b>*</b><span>地区选择:</span> </label>
                            <div class="col-sm-2 col-lg-2 ">
                                <select class="form-control from_sel" id="province" name="province">
                                    <option value="">请选择省份</option>
                                    @foreach($provinces as $province)
                                    <option @if($provin == $province->id) selected @endif value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                   <span class="invalid-feedback" role="alert">
                                       <strong style="color:red;">{{ $message }}</strong>
                                   </span>
                                 @enderror
                            </div>
                            <div class="col-sm-2 col-lg-2 ">
                                <select class="form-control from_sel @error('city') is-invalid @enderror" id="city" name="city" >
                                </select>
                                @error('city')
                                   <span class="invalid-feedback" role="alert">
                                       <strong style="color:red;">{{ $message }}</strong>
                                   </span>
                                 @enderror
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <select class="form-control from_sel @error('county') is-invalid @enderror"  id="county" name="county">
                                </select>
                                @error('city')
                                   <span class="invalid-feedback" role="alert">
                                       <strong style="color:red;">{{ $message }}</strong>
                                   </span>
                                 @enderror
                            </div>
                            <div class="col-sm-4 tips"></div>
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l">
                                <b>*</b><span>消费情况:</span>
                            </label>
                            <div class="col-sm-5 col-lg-5 col-xs-12">
                                <input type="text" class="form-control from_sel input_line @error('consumer_price') is-invalid @enderror" value="{{ old('consumer_price') }}" id="consumer_price" name="consumer_price" placeholder="300-500元">
                            </div>
                            @error('consumer_price')
                               <span class="invalid-feedback" role="alert">
                                   <strong style="color:red;">{{ $message }}</strong>
                               </span>
                             @enderror
                        </div>
           {{--              <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l">
                                <b>*</b><span>简述摘要:</span>
                            </label>
                            <div class="col-sm-9 col-lg-9 re_from_area_top">
                                <textarea value="{{ old('excerpt') }}" class="form-control" rows="3" id="excerpt" placeholder="不少于25个字的简述" name="excerpt" style="resize:none"></textarea>
                            </div>
                            @error('excerpt')
                               <span class="invalid-feedback" role="alert">
                                   <strong style="color:red;">{{ $message }}</strong>
                               </span>
                             @enderror
                        </div> --}}
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l">
                                <b>*</b><span>联系方式:</span>
                            </label>
                            <div class="col-sm-5 col-lg-5 col-xs-12">
                                <input type="text" class="form-control from_sel input_line @error('contact') is-invalid @enderror" value="{{ old('contact') }}" name="contact" id="contact" placeholder="QQ/微信/电话: 139XXXXXXXX">
                            </div>
                             @error('contact')
                               <span class="invalid-feedback" role="alert">
                                   <strong style="color:red;">{{ $message }}</strong>
                               </span>
                             @enderror
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l">
                                <b>*</b><span>详细地址:</span>
                            </label>
                            <div class="col-sm-5 col-lg-5 col-xs-12">
                                <input type="text" class="form-control from_sel input_line @error('contact_address') is-invalid @enderror" id="contact_address" name="contact_address" value="{{ old('contact_address') }}" placeholder="xx路,休闲会所">
                            </div>
                             @error('contact_address')
                               <span class="invalid-feedback" role="alert">
                                   <strong style="color:red;">{{ $message }}</strong>
                               </span>
                             @enderror
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l"><b>*</b><span>服务项目:</span> </label>
                            <div class="col-sm-9 col-lg-9 col-xs-12 checkbox_p">
                                @foreach($tabs as $tab)
                                <label class="checkbox-inline">
                                    <input type="checkbox"  id="tab_ids" name="tab_ids[]" value="{{ $tab->id }}"> {{ $tab->tabname }}
                                </label>
                                @endforeach
                            </div>
                             @error('tab_ids')
                               <span class="invalid-feedback" role="alert">
                                   <strong style="color:red;">{{ $message }}</strong>
                               </span>
                             @enderror
                        </div>
                        <div class="form-group from_li">
                            <label class="col-sm-3 col-lg-2 control-label fromli_l"><b>*</b><span>细节描述:</span> </label>
                            <div class="col-lg-10 col-xs-12">
                                <div id="editor-container">

                                </div>
                                @error('body')
                                  <span class="invalid-feedback" role="alert">
                                      <strong style="color:red;">{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <textarea name="body" hidden="hidden" id="area_body"></textarea>
                        </div>
                        <button type="submit" id="push" class="btn btn-rele">发布</button>
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
            insertImgFn(result.data['path'])
            // $("#topice_img").val(result.data['path'])
        }
    }
    editor.config.onchange = function (newHtml) {
        $('#area_body').val(newHtml)
    }
    editor.create()

    $(document).ready(function(){
        getCity();
        $("#province").change(function () {
            getCity();
        });
        $("#city").change(function () {
            getArea();
        });
    });

    function getCity(){
        var provinceId = parseInt($("#province").val());
            $("#city").empty();
            $.ajax({
                type: "GET",
                url: "{{ route('getCity') }}",
                data: { q: provinceId},
                dataType: 'json',
                success: function (result) {
                    $.each(result, function (i, n) {
                        var option = '<option value="' + n.id + '">' + n.text + '</option>';
                        $("#city").append(option);
                    });
                    //加载地区
                    getArea();
                },
                error: function (x, e) {
                    layer.msg('请求异常')
                }
            });
    }

    function getArea() {
        var cityId = parseInt($("#city").val());
        $("#county").empty();
        $.ajax({
            type: "GET",
            url: "{{ route('getCounty') }}",
            data: { q: cityId},
            dataType: 'json',
            success: function (result) {
                $.each(result, function (i, n) {
                    var option = '<option value="' + n.id + '">' + n.text + '</option>';
                    $("#county").append(option);
                });
            },
            error: function (x, e) {
                layer.msg('请求异常')
            }
        });
    }
</script>
@endsection


