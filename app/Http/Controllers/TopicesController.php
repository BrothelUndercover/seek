<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests\TopiceRequest;
use App\Topice;
use App\City;
use App\Category;
use App\Tab;
use Auth;

class TopicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => ['create','store','uploadImage']]);
    }

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
                    ->where('is_check',true)
                    ->paginate(15);
        $categories = Category::all();

        return view('topices.index',compact('topices','area','categories','request'));
    }

    public function show(Request $request,Topice $topice)
    {
        $topice->addViewCount();
        $topices = Topice::topiceRelated($topice->city)->orderBy('created_at','desc')->take(18)->get();
        return view('topices.show',compact('topice','topices'));
    }


    public function create(Request $request)
    {
        $categories = Category::where('status',true)->get();
        $provinces = City::where('pid',1)->get();
        $tabs = Tab::where('status',true)->get();
        $provin = $request->provi;
        return view('topices.create_and_edit',compact('categories','provinces','tabs','provin'));
    }

    public function store(TopiceRequest $request,Topice $topice)
    {

        $topice = Topice::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id'       => Auth::id(),
            'province'  => $request->province,
            'city'      => $request->city,
            'county'    => $request->county,
            'consumer_price'    => $request->consumer_price,
            'contact'   => $request->contact,
            'contact_address'   => $request->contact_address,
            'body'  => $request->body
        ]);
            if(! is_array($tabs = $request->tab_ids)){
                $tabs = compact('tabs');
            }
            $topice->tabs()->sync($tabs,false);
        return redirect()->to(route('pages.root'))->with('success','发布成功，等待审核');
    }
    public function search(Request $request,City $city)
    {
        $keyword = $request->input('query');
        $topices = Topice::search($keyword)->with('user','proviArea','cityArea','countyArea','category')->orderBy('created_at','desc')->paginate(12);
        $hotCities = $city->getHotCitys();
        return view('topices.search',compact('topices','hotCities'));
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
            $result = $uploader->save($request->tower_picture,'topices',\Auth::id(),300,330);
            if ($result) {
                $data['error'] = 0;
                $data['data']['path'] = $result['path'];
                $data['data']['msg'] = '上传成功';
            }

        }
        return response()->json($data);
    }
}
