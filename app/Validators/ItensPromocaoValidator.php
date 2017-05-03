<?php

namespace viewjs\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ItensPromocaoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'promocao_id'       => 'requerid',
            'produto_id'        => 'requerid',
            'valor'             => 'requerid',
            'valorPromocao'     => 'requerid',
            'quantMaxCliente'   => 'requerid'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
