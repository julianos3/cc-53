<?php

namespace CentralCondo\Repositories\Portal\Manage\ReserveArea;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreaRepository;
use CentralCondo\Entities\Portal\Manage\ReserveArea\ReserveArea;
use CentralCondo\Validators\Portal\Manage\ReserveArea\ReserveAreaValidator;

/**
 * Class ReserveAreaRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\ReserveArea
 */
class ReserveAreaRepositoryEloquent extends BaseRepository implements ReserveAreaRepository
{
    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('name', 'asc')
            ->findWhere([
                'condominium_id' => $condominiumId
            ]);

        return $dados;
    }

    public function getReserveArea($id)
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->findWhere(['id' => $id, 'condominium_id' => $condominiumId]);

        return $dados[0];
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ReserveArea::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ReserveAreaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
