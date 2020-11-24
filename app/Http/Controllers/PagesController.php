<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Topice;
use App\User;
use App\Carousel;

class PagesController extends Controller
{
    public function root(Request $request, Topice $topice, User $user, City $city)
    {
        $topices = $topice->withOrder('default')
                          ->with('user','proviArea','cityArea','countyArea','category','tabs')
                          ->where('is_check',true)
                          ->paginate(30);
         $hotCities = City::where('hot',true)->get();
         $carousels = Carousel::where('status',true)->get();
        return view('pages.root',compact('topices','topice','hotCities','carousels'));
    }

    //地区
    public function region()
    {
        // City::with('childRecursive')->find(3);
        $provinces = City::with('provTopices')->where('pid',1)->get();//省份
        return view('pages.region',compact('provinces'));
    }

    //介绍
    public function mind()
    {
        return view('pages.introduce');
    }
}
