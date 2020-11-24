<?php

if (!function_exists('setting')) {
    function setting($key, $default = '',$setting_name = ''){
        $result =  \Illuminate\Support\Facades\DB::table('settings')->where('key',$key)->first();
        if ( ! $result) {
            return $default;
        }
        return $result->value;
    }
}
