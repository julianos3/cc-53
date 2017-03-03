<?php

namespace CentralCondo\Entities\Admin;

use CentralCondo\Entities\Portal\User\User;
use CentralCondo\Notifications\Admin\UserAdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class AdminUsers extends User implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'active',
        'role'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserAdminResetPasswordNotification($token));
    }

}
