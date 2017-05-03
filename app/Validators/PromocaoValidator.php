<?php

namespace viewjs\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class PromocaoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'descricao' => 'requerid|max:255',
            'inicio'    => 'requerid',
            'final'     => 'requerid'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
