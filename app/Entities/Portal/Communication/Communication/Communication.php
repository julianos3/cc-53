<?php

namespace CentralCondo\Entities\Portal\Communication\Communication;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Communication extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'communication';

    protected $fillable = [
        'condominium_id',
        'user_condominium_id',
        'name',
        'description',
        'date_display',
        'send_mail',
        'all_user'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function communicationGroup()
    {
        return $this->hasMany(CommunicationGroup::class);
    }

    public function userCommunication()
    {
        return $this->hasMany(UserCommunication::class);
    }

}
