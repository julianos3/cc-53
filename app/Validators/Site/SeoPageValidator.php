<?php

namespace CentralCondo\Validators\Site;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SeoPageValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'keywords' => 'required|min:10'
   ];
}
