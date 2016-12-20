<?php

namespace CentralCondo\Validators\Portal\Condominium\Condominium;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserRoleCondominiumValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|min:3',
        'active' => 'required',
        'admin' => 'required'
   ];
}
