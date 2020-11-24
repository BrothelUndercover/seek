<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Topice;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile','avatar','user_status','credit','vip_type','vip_expire_at','introdction','sharecode','notification_count','last_actived_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
        'last_actived_at'
    ];

    public function setLastActivedAtAttribute($value)
    {
        if (!$value) {
            $this->attributes['last_actived_at'] = now();
        }
        return $value;
    }

    public function getAvatarAttribute($value)
    {
        if (!$value) {
             return \Avatar::create($this->name)->toBase64();
        }
        return $value;
    }

    public function topices()
    {

        return $this->hasMany(Topice::class,'user_id','id');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function followers()
    {
        return $this->belongsToMany('App\User','followers','user_id','follower_id');
    }

    public function followings()
    {
        return $this->belongsToMany('App\User','followers','follower_id','user_id');
    }

    //关注
    public function follow($user_ids)
    {
        if(! is_array($user_ids)){
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids,false);
    }

    //取消关注
    public function unfollow($user_ids)
    {
        if (! is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    //是否关注
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }

    //订单
    public function orders()
    {
        return $this->hasMany('App\Order','user_id');
    }
}
