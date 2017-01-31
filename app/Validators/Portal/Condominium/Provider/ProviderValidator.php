<?php

namespace CentralCondo\Validators\Portal\Condominium\Provider;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProviderValidator extends LaravelValidator
{

    protected $rules = [
        'condominium_id' => 'required',
        'provider_category_id' => 'required',
        'name' => 'required|min:3',
        'phone' => 'required',
        'email' => 'required|email',
        'active' => 'required'
   ];
}
