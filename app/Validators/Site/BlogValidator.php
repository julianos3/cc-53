<?php

namespace CentralCondo\Validators\Site;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BlogValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|min:3',
            'description' => 'required',
            'date' => 'required|date',
            'active' => 'required',
            'seo_link' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
