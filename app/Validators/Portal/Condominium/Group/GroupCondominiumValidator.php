<?php

namespace CentralCondo\Validators\Portal\Condominium\Group;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class GroupCondominiumValidator extends LaravelValidator
{

    protected $rules = [
        'condominium_id' => 'required',
        'name' => 'required|min:3',
        'active' => 'required'
   ];
}
