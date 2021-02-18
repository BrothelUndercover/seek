<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('member', MemberController::class);
    $router->resource('membership', MemberShipController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('topices', TopiceController::class);
    $router->resource('tabs', TabController::class);
    $router->resource('carousels', CarouselController::class);
    $router->resource('settings', SettingController::class);
    $router->resource('cards', CardController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('ip-lists', IpListController::class);
    $router->resource('links', LinkController::class);
});
