<?php

namespace CentralCondo\Entities\Portal\User;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait, Notifiable;

    protected $fillable = [
        'name',
        'user_role_id',
        'email',
        'password',
        'sex',
        'phone',
        'description',
        'cell_phone',
        'birth',
        'cpf',
        'marital_status',
        'formation',
        'institution',
        'conclusion',
        'profession',
        'company',
        'facebook',
        'twitter',
        'linkedin',
        'google_plus',
        'instagram',
        'snapchat',
        'site',
        'imagem',
        'active',
        'notification_email'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function userRole()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

}
