<?php

namespace CentralCondo\Validators\Portal\Condominium\Condominium;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CondominiumValidator extends LaravelValidator
{

    protected $rules = [
        /*
        ValidatorInterface::RULE_CREATE => [
            'finality_id' => 'required',
            'city_id' => 'required',
            'user_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
        */
   ];
}
