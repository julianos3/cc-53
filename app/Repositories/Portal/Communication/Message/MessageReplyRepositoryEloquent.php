<?php

namespace CentralCondo\Repositories\Portal\Communication\Message;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Communication\Message\MessageReplyRepository;
use CentralCondo\Entities\Portal\Communication\Message\MessageReply;
use CentralCondo\Validators\Portal\Communication\Message\MessageReplyValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class MessageReplyRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Message
 */
class MessageReplyRepositoryEloquent extends BaseRepository implements MessageReplyRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MessageReply::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MessageReplyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
