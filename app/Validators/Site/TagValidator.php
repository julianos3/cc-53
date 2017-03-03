<?php

namespace CentralCondo\Validators\Site;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class TagValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3',
            'active' => 'required',
            'seo_link' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
