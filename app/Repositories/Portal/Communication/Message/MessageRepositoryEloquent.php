<?php

namespace CentralCondo\Repositories\Portal\Communication\Message;

use CentralCondo\Entities\Portal\Communication\Message\Message;
use CentralCondo\Validators\Portal\Communication\Message\MessageValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class MessageRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Message
 */
class MessageRepositoryEloquent extends BaseRepository implements MessageRepository, CacheableInterface
{
    use CacheableRepository;

    public function getAllPublicCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('created_at', 'desc')
            ->with(['userCondominium', 'messageReply'])
            ->findWhere(['condominium_id' => $condominiumId, 'public' => 'y']);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Message::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return MessageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
