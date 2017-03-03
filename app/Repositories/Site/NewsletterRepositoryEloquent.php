<?php

namespace CentralCondo\Repositories\Site;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Site\NewsletterRepository;
use CentralCondo\Entities\Site\Newsletter;
use CentralCondo\Validators\Site\NewsletterValidator;

/**
 * Class NewsletterRepositoryEloquent
 * @package CentralCondo\Repositories\Site
 */
class NewsletterRepositoryEloquent extends BaseRepository implements NewsletterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Newsletter::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return NewsletterValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
