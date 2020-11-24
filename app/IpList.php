<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpList extends Model
{
    protected $guarded = [];

    public static function checkIp($ip, $bool = false)
    {
        $isIp = self::query()->where('ip',ip2long($ip))
                ->when($bool,function($query){
                    $query->where('ip_type',1); //白名单
                },function($query){
                    $query->where('ip_type',2); //黑名单
                })->count();
        if ($isIp > 0) {
            return true;
        }
            return false;
    }

    //访问器ip
    public function getIpAttribute($value)
    {
        return long2ip($value);
    }

}
