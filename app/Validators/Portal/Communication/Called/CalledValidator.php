<?php

namespace CentralCondo\Validators\Portal\Communication\Called;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CalledValidator extends LaravelValidator
{

    protected $rules = [
        'condominium_id' => 'required',
        'user_condominium_id' => 'required',
        'called_category_id' => 'required',
        'called_status_id' => 'required',
        'subject' => 'required|min:3',
        'description' => 'required',
        'visible' => 'required'
   ];
}
