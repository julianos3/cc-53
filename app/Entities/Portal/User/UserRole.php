<?php

namespace CentralCondo\Entities\Portal\User;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserRole extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'active'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
