<?php

namespace CentralCondo\Repositories\Portal\Communication\Communication;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Communication\CommunicationGroupRepository;
use CentralCondo\Entities\Portal\Communication\Communication\CommunicationGroup;
use CentralCondo\Validators\Portal\Communication\Communication\CommunicationGroupValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CommunicationGroupRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Communication
 */
class CommunicationGroupRepositoryEloquent extends BaseRepository implements CommunicationGroupRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CommunicationGroup::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CommunicationGroupValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
