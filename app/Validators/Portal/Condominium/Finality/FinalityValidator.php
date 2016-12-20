<?php

namespace CentralCondo\Validators\Portal\Condominium\Finality;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class FinalityValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|min:3',
        'active' => 'required'
   ];
}
