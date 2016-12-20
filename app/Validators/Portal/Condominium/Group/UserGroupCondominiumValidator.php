<?php

namespace CentralCondo\Validators\Portal\Condominium\Group;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserGroupCondominiumValidator extends LaravelValidator
{

    protected $rules = [
        'user_condominium_id',
        'group_id'
   ];
}
