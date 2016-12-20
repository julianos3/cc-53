<?php

namespace CentralCondo\Repositories\Portal\Condominium\Unit;

use CentralCondo\Entities\Portal\Condominium\Unit\UnitType;
use CentralCondo\Validators\Portal\Condominium\Unit\UnitTypeValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UnitTypeRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Unit
 */
class UnitTypeRepositoryEloquent extends BaseRepository implements UnitTypeRepository
{
    public function getId($id)
    {
        $dados = $this->findWhere(['id' => $id, 'active' => 'y']);
        return $dados[0];
    }

    public function getAll()
    {
        $dados = $this->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        return $dados;
    }

    public function getGarage()
    {
        $dados = $this->findWhere(['active' => 'y', ['id', '=', '3']]);

        return $dados;
    }

    public function getTypes()
    {
        $dados = $this->orderBy('name', 'asc')->findWhere(['active' => 'y', ['id', '!=', '3']]);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UnitType::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return UnitTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
