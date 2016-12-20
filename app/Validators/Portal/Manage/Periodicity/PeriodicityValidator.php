<?php

namespace CentralCondo\Validators\Portal\Manage\Periodicity;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class PeriodicityValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|min:3',
        'active' => 'required'
   ];
}
