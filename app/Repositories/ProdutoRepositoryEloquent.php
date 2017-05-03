<?php

namespace viewjs\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use viewjs\Repositories\ProdutoRepository;
use viewjs\Entities\Produto;
use viewjs\Validators\ProdutoValidator;

/**
 * Class ProdutoRepositoryEloquent
 * @package namespace viewjs\Repositories;
 */
class ProdutoRepositoryEloquent extends BaseRepository implements ProdutoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Produto::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
