<?php

namespace CentralCondo\Repositories\Portal\Condominium\Unit;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRepository;
use CentralCondo\Entities\Portal\Condominium\Unit\UserUnit;
use CentralCondo\Validators\Portal\Condominium\Unit\UserUnitValidator;

/**
 * Class UserUnitRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Unit
 */
class UserUnitRepositoryEloquent extends BaseRepository implements UserUnitRepository
{

    public function getUnit($id)
    {
        $dados = $this->findWhere(['unit_id' => $id]);

        return $dados;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserUnit::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserUnitValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
