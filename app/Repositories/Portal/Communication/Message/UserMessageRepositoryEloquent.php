<?php

namespace CentralCondo\Repositories\Portal\Communication\Message;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Message\UserMessageRepository;
use CentralCondo\Entities\Portal\Communication\Message\UserMessage;
use CentralCondo\Validators\Portal\Communication\Message\UserMessageValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UserMessageRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Message
 */
class UserMessageRepositoryEloquent extends BaseRepository implements UserMessageRepository, CacheableInterface
{
    use CacheableRepository;

    public function getAllUserCondominium()
    {
        $dados = $this->orderBy('created_at', 'desc')
            ->with(['message'])
            ->findWhere(['user_condominium_id' => session()->get('user_condominium_id')]);

        return $dados;
    }

    public function getAllUserPrivateCondominium()
    {
        $dados = $this->orderBy('created_at', 'desc')
            ->with(['message'])
            ->findWhere(['user_condominium_id' => session()->get('user_condominium_id')]);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserMessage::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserMessageValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
