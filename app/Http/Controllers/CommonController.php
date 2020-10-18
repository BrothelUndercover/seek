<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;

class CommonController extends Controller
{

    public function city(Request $request)
    {
        return City::where('pid',$request->q)->get(['id','name as text']);

    }
    public function county(Request $request)
    {
        return City::where('pid',$request->q)->get(['id','name as text']);
    }

    public function arrayToJson()
    {
        $data = City::all()->toArray();
        $rest = [];
        // foreach ($sepll as $i => $val) {
            foreach ($data as $key => $value) {
                   $rest[$value['initial']]['name'] = $value['initial'];
                   $rest[$value['initial']]['item'][$key]['name'] = $value['name'];
                   $rest[$value['initial']]['item'][$key]['value'] = $value['id'];
                }
        array_unshift($rest,['name'=> '热门城市','item'=> ['0' => ['name'=> '北京','value'=> 52],'1' => ['name'=> '广州','value'=>76],'2' => ['name'=> '深圳','value'=>77],'3' => ['name'=> '上海','value'=>321],'4' => ['name'=> '西安','value'=>311],'5' => ['name'=> '武汉','value'=>180]]]);
        $ttes = json_encode(array_values($rest),JSON_UNESCAPED_UNICODE);
        file_put_contents('/var/www/tower/cities.json',$ttes);
    }

}
