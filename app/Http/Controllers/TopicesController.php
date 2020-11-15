<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Topice;
use App\City;
use App\Category;
use App\Handlers\ImageUploadHandler;

class TopicesController extends Controller
{
    public function index(Request $request)
    {
        $areaSpell = $request->province;
        $cateId = $request->category ?? false;
        $cityId = $request->city ?? false;;
        $countyId = $request->county ?? false;;
        $area = City::with('childRecursive')->where('spell',$areaSpell)->first();
        $topices = $area->provTopices()
                    ->when($cateId,function(Builder $query) use ($cateId){
                        return $query->where('category_id',$cateId);
                    })
                    -> when($cityId,function(Builder $query) use ($cityId){
                        return $query->where('city',$cityId);
                    })
                    -> when($countyId,function(Builder $query) use ($countyId){
                        return $query->where('county',$countyId);
                    })
                    ->paginate(6);
        $categories = Category::all();

        return view('topices.index',compact('topices','area','categories','request'));
    }

    public function show(Request $request,Topice $topice)
    {

        return view('topices.show',compact('topice'));
    }


    public function create()
    {
        return view('topices.create_and_edit');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
    public function search(Request $request,Topice $topice)
    {
        $topices = $topice->with('user','proviArea','cityArea','countyArea','category')
                            ->search($request->q)
                            ->paginate(6);
        $hotCities = City::where('hot',true)->get();
        return view('topices.search',compact('topices','request','hotCities'));
    }

    public function uploadImage(Request $request,ImageUploadHandler $uploader)
    {
        $data = [
            'error' => '-1',
            'data'  => [
                'path' => '',
                'msg'  => '上传失败',
            ]
        ];
        if ( $file = $request->tower_picture) {
            if (is_array($file)) {
                $data['data']['msg'] = '只能不支持多图同时上传';
                return response('','401')->json($data);
            }
            $result = $uploader->save($request->tower_picture,'topices',\Auth::id(),300,400);
            if ($result) {
                $data['error'] = 0;
                $data['data']['path'] = $result['path'];
                $data['data']['msg'] = '上传成功';
            }

        }
        return response()->json($data);
    }
}
