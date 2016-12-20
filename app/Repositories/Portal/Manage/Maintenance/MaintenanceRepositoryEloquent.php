<?php

namespace CentralCondo\Repositories\Portal\Manage\Maintenance;

use CentralCondo\Entities\Portal\Manage\Maintenance\Maintenance;
use CentralCondo\Validators\Portal\Manage\Maintenance\MaintenanceValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class MaintenanceRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\Maintenance
 */
class MaintenanceRepositoryEloquent extends BaseRepository implements MaintenanceRepository
{

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('name', 'asc')
                    ->with('periodicity')
                    ->findWhere([
                        'condominium_id' => $condominiumId
                    ]);

        return $dados;
    }

    public function getMaintenance($id)
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
        return Maintenance::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return MaintenanceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
