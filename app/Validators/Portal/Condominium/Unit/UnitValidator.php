<?php

namespace CentralCondo\Validators\Portal\Condominium\Unit;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UnitValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required',
        'condominium_id' => 'required',
        'block_id' => 'required',
        'unit_type_id' => 'required',
        'unit_id' => 'required'
   ];
}
