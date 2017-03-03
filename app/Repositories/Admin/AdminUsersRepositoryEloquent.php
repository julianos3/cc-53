<?php

namespace CentralCondo\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Admin\AdminUsersRepository;
use CentralCondo\Entities\Admin\AdminUsers;
use CentralCondo\Validators\Admin\AdminUsersValidator;

/**
 * Class AdminUsersRepositoryEloquent
 * @package CentralCondo\Repositories\Admin
 */
class AdminUsersRepositoryEloquent extends BaseRepository implements AdminUsersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminUsers::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AdminUsersValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
