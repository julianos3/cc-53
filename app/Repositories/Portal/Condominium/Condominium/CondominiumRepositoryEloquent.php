<?php

namespace CentralCondo\Repositories\Portal\Condominium\Condominium;

use CentralCondo\Entities\Portal\Condominium\Condominium\Condominium;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Condominium\CondominiumRepository;
use CentralCondo\Validators\Portal\Condominium\Condominium\CondominiumValidator;

/**
 * Class CondominiumRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Condominium
 */
class CondominiumRepositoryEloquent extends BaseRepository implements CondominiumRepository
{

    public function getCondominiumId($id)
    {
        $dados = $this->with(['city'])->find($id);

        return $dados;
    }

    public function getCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->find($condominiumId);

        return $dados;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Condominium::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return CondominiumValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
