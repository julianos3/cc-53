<?php

namespace CentralCondo\Entities\Portal\Condominium\Condominium;

use CentralCondo\Entities\Portal\Communication\Called\Called;
use CentralCondo\Entities\Portal\Communication\Called\CalledHistoric;
use CentralCondo\Entities\Portal\Communication\Communication\Communication;
use CentralCondo\Entities\Portal\Communication\Communication\UserCommunication;
use CentralCondo\Entities\Portal\Communication\Message\Message;
use CentralCondo\Entities\Portal\Communication\Message\MessageReply;
use CentralCondo\Entities\Portal\Communication\Message\UserMessage;
use CentralCondo\Entities\Portal\Communication\Notification\Notification;
use CentralCondo\Entities\Portal\Condominium\Diary\Diary;
use CentralCondo\Entities\Portal\Condominium\Group\UserGroupCondominium;
use CentralCondo\Entities\Portal\Condominium\Unit\UserUnit;
use CentralCondo\Entities\Portal\Manage\Maintenance\Maintenance;
use CentralCondo\Entities\Portal\User\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserCondominium extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_condominium';

    protected $fillable = [
        'user_id',
        'user_role_condominium_id',
        'condominium_id',
        'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userRoleCondominium()
    {
        return $this->belongsTo(UserRoleCondominium::class);
    }

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userUnit()
    {
        return $this->hasMany(UserUnit::class);
    }

    public function userGroupCondominium()
    {
        return $this->hasMany(UserGroupCondominium::class);
    }

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function messageReply()
    {
        return $this->belongsTo(MessageReply::class);
    }

    public function userMessage()
    {
        return $this->belongsTo(UserMessage::class);
    }

    public function called()
    {
        return $this->belongsTo(Called::class);
    }

    public function calledHistoric()
    {
        return $this->belongsTo(CalledHistoric::class);
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

    public function userCommunication()
    {
        return $this->belongsTo(UserCommunication::class);
    }

}
