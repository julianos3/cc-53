<?php

namespace CentralCondo\Validators\Portal\Condominium\Block;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BlockValidator extends LaravelValidator
{

    protected $rules = [
        'condominium_id' => 'required',
        'name' => 'required|min:3'
   ];
}
