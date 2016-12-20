<?php

namespace CentralCondo\Entities\Portal\Communication\Message;

use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserMessage extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_message';

    protected $fillable = [
        'message_id',
        'user_condominium_id'
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
