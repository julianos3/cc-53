<?php

namespace CentralCondo\Validators\Portal\Condominium\Unit;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserUnitValidator extends LaravelValidator
{

    protected $rules = [
        'user_condominium_id' => 'required',
        'unit_id' => 'required',
        'user_unit_role_id' => 'required'
   ];
}
