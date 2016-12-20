<?php

namespace CentralCondo\Repositories\Portal\Manage\Contract;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Manage\Contract\ContractStatusRepository;
use CentralCondo\Entities\Portal\Manage\Contract\ContractStatus;
use CentralCondo\Validators\Portal\Manage\Contract\ContractStatusValidator;

/**
 * Class ContractStatusRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\Contract
 */
class ContractStatusRepositoryEloquent extends BaseRepository implements ContractStatusRepository
{

    public function getAllActive()
    {
        $dados = $this->findWhere(['active' => 'y']);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContractStatus::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ContractStatusValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
