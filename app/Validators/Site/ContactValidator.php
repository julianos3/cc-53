<?php

namespace CentralCondo\Validators\Site;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ContactValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'message' => 'required|min:5'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
