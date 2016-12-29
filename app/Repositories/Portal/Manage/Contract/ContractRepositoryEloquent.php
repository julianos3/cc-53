<?php

namespace CentralCondo\Repositories\Portal\Manage\Contract;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Manage\Contract\ContractRepository;
use CentralCondo\Entities\Portal\Manage\Contract\Contract;
use CentralCondo\Validators\Portal\Manage\Contract\ContractValidator;

/**
 * Class ContractRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\Contract
 */
class ContractRepositoryEloquent extends BaseRepository implements ContractRepository
{

    protected $fieldSearchable = [
        'name' => 'like',
        'provider.name'
    ];

    public function getContract($id)
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->findWhere(['id' => $id, 'condominium_id' => $condominiumId]);

        return $dados[0];
    }

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('end_date','asc')
            ->with(['contractStatus', 'provider'])
            ->findWhere([
                'condominium_id' => $condominiumId
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
        return Contract::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ContractValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
