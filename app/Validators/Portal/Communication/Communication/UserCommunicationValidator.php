<?php

namespace CentralCondo\Validators\Portal\Communication\Communication;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserCommunicationValidator extends LaravelValidator
{

    protected $rules = [
        'user_condominium_id' => 'required',
        'communication_id' => 'required',
        'view' => 'required',
        //'date_view' => 'required'
   ];
}
