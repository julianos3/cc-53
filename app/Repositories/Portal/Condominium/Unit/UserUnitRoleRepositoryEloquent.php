<?php

namespace CentralCondo\Repositories\Portal\Condominium\Unit;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Unit\UserUnitRoleRepository;
use CentralCondo\Entities\Portal\Condominium\Unit\UserUnitRole;
use CentralCondo\Validators\Portal\Condominium\Unit\UserUnitRoleValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserUnitRoleRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\User
 */
class UserUnitRoleRepositoryEloquent extends BaseRepository implements UserUnitRoleRepository, CacheableInterface
{
    use CacheableRepository;

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
        return UserUnitRole::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserUnitRoleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
