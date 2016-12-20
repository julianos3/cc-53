<?php

namespace CentralCondo\Validators\Portal\User;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserRoleValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|min:3',
        'active' => 'required'
   ];
}
