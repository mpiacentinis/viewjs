<?php

namespace viewjs\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Produto extends Model implements Transformable
{
    use TransformableTrait;

    protected  $fillable = [

        'descricao',
        'codeBar',
        'und',
        'preco',
        'promocao',
        'imagem'
    ];

}
