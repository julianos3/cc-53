<?php

namespace CentralCondo\Repositories\Portal\Communication\Communication;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use CentralCondo\Entities\Portal\Communication\Communication\UserCommunication;
use CentralCondo\Validators\Portal\Communication\Communication\UserCommunicationValidator;

/**
 * Class UserCommunicationRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Communication
 */
class UserCommunicationRepositoryEloquent extends BaseRepository implements UserCommunicationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserCommunication::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserCommunicationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
