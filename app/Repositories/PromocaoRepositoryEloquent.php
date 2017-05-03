<?php

namespace viewjs\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use viewjs\Repositories\PromocaoRepository;
use viewjs\Entities\Promocao;
use viewjs\Validators\PromocaoValidator;

/**
 * Class PromocaoRepositoryEloquent
 * @package namespace viewjs\Repositories;
 */
class PromocaoRepositoryEloquent extends BaseRepository implements PromocaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Promocao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
