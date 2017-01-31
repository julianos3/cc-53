<?php

namespace CentralCondo\Entities\Portal\Condominium\Condominium;

use CentralCondo\Entities\Portal\City;
use CentralCondo\Entities\Portal\Communication\Called\Called;
use CentralCondo\Entities\Portal\Communication\Communication\Communication;
use CentralCondo\Entities\Portal\Communication\Message\Message;
use CentralCondo\Entities\Portal\Communication\Notification\Notification;
use CentralCondo\Entities\Portal\Condominium\Block\Block;
use CentralCondo\Entities\Portal\Condominium\Diary\Diary;
use CentralCondo\Entities\Portal\Condominium\Finality\Finality;
use CentralCondo\Entities\Portal\Condominium\Group\GroupCondominium;
use CentralCondo\Entities\Portal\Condominium\SecurityCam\SecurityCam;
use CentralCondo\Entities\Portal\Condominium\Subscriptions\Subscriptions;
use CentralCondo\Entities\Portal\Condominium\Unit\Unit;
use CentralCondo\Entities\Portal\Manage\Contract\Contract;
use CentralCondo\Entities\Portal\Manage\Maintenance\Maintenance;
use CentralCondo\Entities\Portal\Manage\ReserveArea\ReserveArea;
use CentralCondo\Entities\Portal\User\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Laravel\Cashier\Billable;

class Condominium extends Model implements Transformable
{
    use TransformableTrait, Billable;

    protected $table = 'condominium';

    protected $fillable = [
        'finality_id',
        'city_id',
        'user_id',
        'name',
        'zip_code',
        'address',
        'number',
        'district',
        'complement',
        'cnpj',
        'address_site',
        'image',
        'active',
        'stripe_id',
        'card_brand',
        'card_last_four',
        'trial_ends_at'
    ];

    public function finality()
    {
        return $this->belongsTo(Finality::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function securityCam()
    {
        return $this->belongsTo(SecurityCam::class);
    }

    public function groupCondominium()
    {
        return $this->belongsTo(GroupCondominium::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function reserveArea()
    {
        return $this->belongsTo(ReserveArea::class);
    }

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function called()
    {
        return $this->belongsTo(Called::class);
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

    public function subscriptions()
    {
        return $this->belongsTo(Subscriptions::class);
    }

}
