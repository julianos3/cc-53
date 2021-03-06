<?php

namespace CentralCondo\Repositories\Portal\Condominium\Provider;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Provider\ProviderCategoryRepository;
use CentralCondo\Entities\Portal\Condominium\Provider\ProviderCategory;
use CentralCondo\Validators\Portal\Condominium\Provider\ProviderCategoryValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class ProviderCategoryRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Provider
 */
class ProviderCategoryRepositoryEloquent extends BaseRepository implements ProviderCategoryRepository, CacheableInterface
{
    use CacheableRepository;

    public function getAllActive()
    {
        $dados = $this->orderBy('name','asc')->findWhere(['active' => 'y']);
        return $dados;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProviderCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProviderCategoryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
