<?php

namespace viewjs\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ItensPromocao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'promocao_id',
        'produto_id',
        'valor',
        'valorPromocao',
        'quantMaxCliente'
    ];

}
