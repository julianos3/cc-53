<?php

namespace CentralCondo\Validators\Portal\Manage\Contract;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContractStatusValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|min:3',
        'active' => 'required'
   ];
}
