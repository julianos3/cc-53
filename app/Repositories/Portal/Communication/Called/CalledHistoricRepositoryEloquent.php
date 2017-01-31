<?php

namespace CentralCondo\Repositories\Portal\Communication\Called;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Called\CalledHistoricRepository;
use CentralCondo\Entities\Portal\Communication\Called\CalledHistoric;
use CentralCondo\Validators\Portal\Communication\Called\CalledHistoricValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CalledHistoricRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Called
 */
class CalledHistoricRepositoryEloquent extends BaseRepository implements CalledHistoricRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CalledHistoric::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CalledHistoricValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
