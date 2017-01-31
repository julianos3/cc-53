<?php

namespace CentralCondo\Repositories\Portal\Manage\Maintenance;

use CentralCondo\Entities\Portal\Manage\Maintenance\Maintenance;
use CentralCondo\Validators\Portal\Manage\Maintenance\MaintenanceValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class MaintenanceRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\Maintenance
 */
class MaintenanceRepositoryEloquent extends BaseRepository implements MaintenanceRepository, CacheableInterface
{
    use CacheableRepository;

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

    public function getMaintenanceWeek()
    {
        $condominiumId = session()->get('condominium_id');
        /*
        $dados = $this->orderBy('end_date','asc')
            ->findWhere([
                'condominium_id' => $condominiumId,
                'contract_status_id' => 1,
                [
                    'end_date', '<=', Carbon::now()->month(2)
                ]
            ])->count();

        return $dados;
        */

        return true;
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
