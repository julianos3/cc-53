<?php

namespace CentralCondo\Entities\Portal\Condominium\Diary;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Entities\Portal\Manage\ReserveArea\ReserveArea;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Diary extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'diaries';

    protected $fillable = [
        'condominium_id',
        'user_condominium_id',
        'reserve_area_id',
        'reason',
        'date',
        'start_time',
        'end_time',
        'description',
        'value',
        'notify'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function reserveArea()
    {
        return $this->belongsTo(ReserveArea::class, 'reserve_area_id');
    }

}
