<?php

namespace CentralCondo\Validators\Portal\Condominium\Condominium;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserCondominiumValidator extends LaravelValidator
{

    protected $rules = [
        'user_id' => 'required',
        'user_role_condominium_id' => 'required',
        'condominium_id' => 'required',
        'active' => 'required'
   ];
}
