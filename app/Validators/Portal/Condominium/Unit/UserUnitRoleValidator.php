<?php

namespace CentralCondo\Validators\Portal\Condominium\Unit;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserUnitRoleValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|min:3',
        'active' => 'required'
   ];
}
