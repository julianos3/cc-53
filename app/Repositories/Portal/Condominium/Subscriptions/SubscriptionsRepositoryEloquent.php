<?php

namespace CentralCondo\Repositories\Portal\Condominium\Subscriptions;

use CentralCondo\Entities\Portal\Condominium\Subscriptions\Subscriptions;
use CentralCondo\Validators\Portal\Condominium\Subscriptions\SubscriptionsValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProviderRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Subscriptions
 */
class SubscriptionsRepositoryEloquent extends BaseRepository implements SubscriptionsRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subscriptions::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return SubscriptionsValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
