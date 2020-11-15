<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', '狼友阁') - 2020全国免费凤楼信息 - 分享楼凤兼职，酒店会所，桑拿洗浴，全国楼凤</title>
  <meta name="author" content="凤楼阁">
  <meta name="description" content="@yield('description','楼凤,小姐,凤楼信息,2020年,全国免费,凤楼阁论坛，自由开放，信息共享，这里有全国各地楼凤，兼职，良家，桑拿，洗浴，按摩，会所，高端外围及体验感受的详细性息介绍,全国楼凤论坛免费')" />
  <meta name="keyword" content="@yield('keyword', '2020全国免费凤楼信息,楼凤,社区,论坛,高端,外围,伴游')" />

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
  <link href="{{ asset('frame/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
  <link href="{{ asset('frame/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  @yield('styles')

</head>

<body>
  <div id="app">

    @include('layouts._header')


      @yield('content')


    @include('layouts._footer')
  </div>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ mix('js/expand.js') }}"></script>
  <script src="{{ asset('js/IE.js') }}"></script>
  <script src="{{ asset('frame/layer/layer.js') }}"></script>

  @yield('scripts')

</body>

</html>
