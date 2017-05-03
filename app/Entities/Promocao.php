<?php

namespace viewjs\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Promocao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'descricao',
        'inicio',
        'final'
    ];


}
