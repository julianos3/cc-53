<?php

namespace CentralCondo\Repositories\Site;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Site\BlogImagesRepository;
use CentralCondo\Entities\Site\BlogImages;
use CentralCondo\Validators\Site\BlogImagesValidator;

/**
 * Class BlogImagesRepositoryEloquent
 * @package CentralCondo\Repositories\Site
 */
class BlogImagesRepositoryEloquent extends BaseRepository implements BlogImagesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BlogImages::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BlogImagesValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
