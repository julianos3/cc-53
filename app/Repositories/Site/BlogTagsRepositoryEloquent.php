<?php

namespace CentralCondo\Repositories\Site;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Site\BlogTagsRepository;
use CentralCondo\Entities\Site\BlogTags;
use CentralCondo\Validators\Site\BlogTagsValidator;

/**
 * Class BlogTagsRepositoryEloquent
 * @package CentralCondo\Repositories\Site
 */
class BlogTagsRepositoryEloquent extends BaseRepository implements BlogTagsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BlogTags::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BlogTagsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
