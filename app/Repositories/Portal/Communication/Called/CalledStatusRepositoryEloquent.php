<?php

namespace CentralCondo\Repositories\Portal\Communication\Called;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Called\CalledStatusRepository;
use CentralCondo\Entities\Portal\Communication\Called\CalledStatus;
use CentralCondo\Validators\Portal\Communication\Called\CalledStatusValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CalledStatusRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Called
 */
class CalledStatusRepositoryEloquent extends BaseRepository implements CalledStatusRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * @return mixed
     */
    public function getAll()
    {
        $dados = $this->findWhere(['active' => 'y']);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CalledStatus::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CalledStatusValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
