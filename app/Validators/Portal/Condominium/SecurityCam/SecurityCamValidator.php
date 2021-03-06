<?php

namespace CentralCondo\Validators\Portal\Condominium\SecurityCam;

use Prettus\Validator\LaravelValidator;

class SecurityCamValidator extends LaravelValidator
{

    protected $rules = [
        'condominium_id' => 'required',
        'name' => 'required|min:3',
        'url' => 'required'
    ];
}
