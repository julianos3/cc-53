<?php

namespace CentralCondo\Validators\Portal\User;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'user_role_id' => 'required',
            'name' => 'required|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'user_role_id' => 'required',
            'name' => 'required|min:3',
            'email' => 'required|email|max:255',
            'sex' => 'required',
            //'password' => 'required|min:6'
        ]
    ];
}
