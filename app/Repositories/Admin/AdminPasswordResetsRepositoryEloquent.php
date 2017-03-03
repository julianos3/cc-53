<?php

namespace CentralCondo\Repositories\Admin;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Admin\AdminPasswordResetsRepository;
use CentralCondo\Entities\AdminPasswordResets;

/**
 * Class AdminPasswordResetsRepositoryEloquent
 * @package CentralCondo\Repositories\Admin
 */
class AdminPasswordResetsRepositoryEloquent extends BaseRepository implements AdminPasswordResetsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminPasswordResets::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
