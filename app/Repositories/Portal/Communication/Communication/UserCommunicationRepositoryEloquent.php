<?php

namespace CentralCondo\Repositories\Portal\Communication\Communication;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Communication\UserCommunicationRepository;
use CentralCondo\Entities\Portal\Communication\Communication\UserCommunication;
use CentralCondo\Validators\Portal\Communication\Communication\UserCommunicationValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserCommunicationRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Communication
 */
class UserCommunicationRepositoryEloquent extends BaseRepository implements UserCommunicationRepository, CacheableInterface
{
    use CacheableRepository;

    public function getAllCondominium()
    {
        $dados = $this->with(['communication'])
            ->orderBy('created_at','desc')
            ->findWhere([
                'user_condominium_id' => session()->get('user_condominium_id')
            ]);

        return $dados;
    }

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
