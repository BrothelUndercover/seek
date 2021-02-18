<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Topice;
use App\User;
use App\Carousel;
use App\Link;

class PagesController extends Controller
{
    public function root(Request $request, Topice $topice,Link $link,Carousel $carousel,City $city)
    {
        $topices = $topice->withOrder('default')
                          ->with('user','proviArea','cityArea','countyArea','category','tabs')
                          ->where('is_check',true)
                          ->take(12)
                          ->get();
         $hotCities = $city->getHotCitys();
         $carousels = $carousel->getCarousel();
         $links = $link->getLinksCached();
        return view('pages.root',compact('topices','topice','hotCities','carousels','links'));
    }

    public function pageRoot(Request $request,Topice $topice){
        if(request()->ajax()){
            $topices = $topice->withOrder('default')
                      ->with('user','proviArea','cityArea','countyArea','category','tabs')
                      ->where('is_check',true)
                      ->paginate(12);
                return response()->json(['topices' => $topices,'code' => 1]);
        }
        return response()->json(['topices' => '','code' => -1]);
    }
    //地区
    public function region(City $city)
    {
        $provinces = $city->where('pid',1)->get();//省份
        return view('pages.region',compact('provinces'));
    }

    //介绍
    public function mind()
    {
        return view('pages.introduce');
    }
}
