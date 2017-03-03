<?php

namespace CentralCondo\Repositories\Site;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Site\SeoPageRepository;
use CentralCondo\Entities\Site\SeoPage;
use CentralCondo\Validators\Site\SeoPageValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SeoPageRepositoryEloquent
 * @package CentralCondo\Repositories\Site
 */
class SeoPageRepositoryEloquent extends BaseRepository implements SeoPageRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SeoPage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SeoPageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
