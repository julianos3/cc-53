<?php

namespace CentralCondo\Repositories\Portal\Manage\Periodicity;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Manage\Periodicity\PeriodicityRepository;
use CentralCondo\Entities\Portal\Manage\Periodicity\Periodicity;
use CentralCondo\Validators\Portal\Manage\Periodicity\PeriodicityValidator;

/**
 * Class PeriodicityRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\Periodicity
 */
class PeriodicityRepositoryEloquent extends BaseRepository implements PeriodicityRepository
{

    public function getAll()
    {
        $dados = $this->orderBy('id', 'asc')->findWhere(['active' => 'y']);

        return $dados;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Periodicity::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PeriodicityValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
