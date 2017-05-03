<?php

namespace viewjs\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use viewjs\Repositories\ItensPromocaoRepository;
use viewjs\Entities\ItensPromocao;
use viewjs\Validators\ItensPromocaoValidator;

/**
 * Class ItensPromocaoRepositoryEloquent
 * @package namespace viewjs\Repositories;
 */
class ItensPromocaoRepositoryEloquent extends BaseRepository implements ItensPromocaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ItensPromocao::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ItensPromocaoValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
