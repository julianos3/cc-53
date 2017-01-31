<?php

namespace CentralCondo\Repositories\Portal;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\CityRepository;
use CentralCondo\Entities\Portal\City;
use CentralCondo\Validators\Portal\CityValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CityRepositoryEloquent
 * @package namespace CentralCondo\Repositories;
 */
class CityRepositoryEloquent extends BaseRepository implements CityRepository, CacheableInterface
{
    use CacheableRepository;

    public function listCityState($id)
    {
        $dados = $this->orderBy('name', 'asc')->findWhere(['state_id' => $id]);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return City::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CityValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
