<?php

namespace CentralCondo\Repositories\Portal\Condominium\Unit;

use CentralCondo\Entities\Portal\Condominium\Unit\Unit;
use CentralCondo\Validators\Portal\Condominium\Unit\UnitValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class UnitRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Unit
 */
class UnitRepositoryEloquent extends BaseRepository implements UnitRepository, CacheableInterface
{
    use CacheableRepository;

    public function deleteAllCondominium()
    {
        $unit = $this->getAllCondominium();
        if ($unit) {
            foreach ($unit as $row) {
                $this->delete($row->id);
            }
        }

        return true;
    }

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->with(['unitType', 'block'])->orderBy('name', 'asc')->findWhere(['condominium_id' => $condominiumId]);

        return $dados;
    }

    public function garageAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->with(['block'])
            ->findWhere([
                'condominium_id' => $condominiumId,
                ['unit_type_id', '=', '3']
            ]);

        return $dados;
    }

    public function unitAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->with(['block', 'unitType'])
            ->findWhere([
                'condominium_id' => $condominiumId,
                ['unit_type_id', '!=', '3']
            ]);

        return $dados;
    }

    public function getUnit($id)
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
        return Unit::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return UnitValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
