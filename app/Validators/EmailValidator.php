<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class EmailValidator.
 *
 * @package namespace App\Validators;
 */
class EmailValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        
         ValidatorInterface::RULE_CREATE => [
            'username' => 'required|min:2|max:255',
            'subject' => 'required|min:2|max:255',
            'content' => 'required|min:2|max:255',
            'to' => 'required|email|max:255',
            'from' => 'required|email|max:255',
        ],

        ValidatorInterface::RULE_UPDATE => [
            'username' => 'min:2|max:255',
            'subject' => 'min:2|max:255',
            'content' => 'min:2|max:255',
            'to' => 'email|max:255',
            'from' => 'email|max:255',
        ],   

        
    ];
}

