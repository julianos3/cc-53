<?php

namespace CentralCondo\Repositories\Portal\Condominium\Condominium;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserRoleCondominiumRepository;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserRoleCondominium;
use CentralCondo\Validators\Portal\Condominium\Condominium\UserRoleCondominiumValidator;

/**
 * Class UserRoleCondominiumRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Condominium
 */
class UserRoleCondominiumRepositoryEloquent extends BaseRepository implements UserRoleCondominiumRepository
{
    public function getAll()
    {
        $dados = $this->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        return $dados;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserRoleCondominium::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserRoleCondominiumValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
