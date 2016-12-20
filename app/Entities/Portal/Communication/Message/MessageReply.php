<?php

namespace CentralCondo\Entities\Portal\Communication\Message;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MessageReply extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = "message_reply";

    protected $fillable = [
        'message_id',
        'user_condominium_id',
        'message'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function userCondominium()
    {
        return $this->belongsTo(UserCondominium::class);
    }

}
