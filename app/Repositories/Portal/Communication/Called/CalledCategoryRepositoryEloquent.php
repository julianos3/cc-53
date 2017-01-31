<?php

namespace CentralCondo\Repositories\Portal\Communication\Called;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Called\CalledCategoryRepository;
use CentralCondo\Entities\Portal\Communication\Called\CalledCategory;
use CentralCondo\Validators\Portal\Communication\Called\CalledCategoryValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CalledCategoryRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Called
 */
class CalledCategoryRepositoryEloquent extends BaseRepository implements CalledCategoryRepository, CacheableInterface
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
        return CalledCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CalledCategoryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
