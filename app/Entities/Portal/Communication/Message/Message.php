<?php

namespace CentralCondo\Entities\Portal\Communication\Message;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Message extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'message';

    protected $fillable = [
        'condominium_id',
        'user_condominium_id',
        'subject',
        'message',
        'public',
        'type'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

    public function messageReply()
    {
        return $this->hasMany(MessageReply::class);
    }

    public function userMessage()
    {
        return $this->belongsTo(UserMessage::class);
    }

}
