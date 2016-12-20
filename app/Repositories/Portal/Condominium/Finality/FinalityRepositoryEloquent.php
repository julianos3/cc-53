<?php

namespace CentralCondo\Repositories\Portal\Condominium\Finality;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Finality\FinalityRepository;
use CentralCondo\Entities\Portal\Condominium\Finality\Finality;
use CentralCondo\Validators\Portal\Condominium\Finality\FinalityValidator;

/**
 * Class FinalityRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Finality
 */
class FinalityRepositoryEloquent extends BaseRepository implements FinalityRepository
{
    public function getAll()
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
        return Finality::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FinalityValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
