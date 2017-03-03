<?php

namespace CentralCondo\Validators\Site;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class NewsletterValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => 'required|email|unique:newsletters,email'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
