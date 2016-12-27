<?php

namespace CentralCondo\Repositories\Portal\User;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\User\UserRoleRepository;
use CentralCondo\Entities\Portal\User\UserRole;
use CentralCondo\Validators\Portal\User\UserRoleValidator;

/**
 * Class UserRoleRepositoryEloquent
 * @package namespace CentralCondo\Repositories;
 */
class UserRoleRepositoryEloquent extends BaseRepository implements UserRoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserRole::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserRoleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
