<?php

namespace CentralCondo\Validators\Portal\Manage\ReserveArea;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ReserveAreaValidator extends LaravelValidator
{

    protected $rules = [
        'condominium_id' => 'required',
        'name' => 'required|min:3',
        'active' => 'required'
   ];
}
