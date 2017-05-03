<?php

namespace viewjs\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProdutoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'descricao' => 'requerid|max:255',
            'codeBar'   => 'requerid|max:13',
            'und'       => 'requerid|max:3',
            'preco'     => 'requerid',
            'promocao'  => 'requerid',
            'imagem'    => 'requerid|max:255'
        ],
        ValidatorInterface::RULE_UPDATE => [],
   ];
}
