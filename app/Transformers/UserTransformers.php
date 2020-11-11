<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => (int) $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'avatar' => $user->avatar,
            'user_status'  => $user->user_status,
            'credit'    => $user->credit,
            'vip_type'  => $user->vip_type,
            'vip_expire_at' => $user->vip_expire_at,
            'last_actived_at' => $user->last_actived_at,
            'introdction'   => $user->introdction,
            'sharecode'     => $user->sharecode,
            'notification_count' => $user->notification_count,
            'email_verified_at' => $user->email_verified_at,
            'created_at' => (string) $user->created_at,
            'updated_at' => (string) $user->updated_at,
        ];
    }
}
