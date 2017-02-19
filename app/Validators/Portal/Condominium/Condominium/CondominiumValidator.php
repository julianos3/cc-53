<?php

namespace CentralCondo\Validators\Portal\Condominium\Condominium;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CondominiumValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'city_id' => 'required',
            'user_id' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'number' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3',
            'finality_id' => 'required'
        ],
        /*
        'city_id' => 'required|exists:city',
        'user_id' => 'required|exists:users',
        'zip_code' => 'required',
        'address' => 'required',
        'number' => 'required'
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
