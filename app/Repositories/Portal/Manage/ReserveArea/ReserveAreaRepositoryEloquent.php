<?php

namespace CentralCondo\Repositories\Portal\Manage\ReserveArea;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Manage\ReserveArea\ReserveAreaRepository;
use CentralCondo\Entities\Portal\Manage\ReserveArea\ReserveArea;
use CentralCondo\Validators\Portal\Manage\ReserveArea\ReserveAreaValidator;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class ReserveAreaRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\ReserveArea
 */
class ReserveAreaRepositoryEloquent extends BaseRepository implements ReserveAreaRepository, CacheableInterface
{
    use CacheableRepository;

    public function getAllCondominium()
    {
        $dados = $this->orderBy('name', 'asc')
            ->findWhere([
                'condominium_id' => session()->get('condominium_id')
            ]);

        return $dados;
    }

    public function getAllCondominiumActive()
    {
        $dados = $this->orderBy('name', 'asc')
            ->findWhere([
                'condominium_id' => session()->get('condominium_id'),
                'active' => 'y'
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
