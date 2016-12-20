<?php

namespace CentralCondo\Repositories\Portal\Manage\Maintenance;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Manage\Maintenance\MaintenanceCompletedRepository;
use CentralCondo\Entities\Portal\Manage\Maintenance\MaintenanceCompleted;
use CentralCondo\Validators\Portal\Manage\Maintenance\MaintenanceCompletedValidator;

/**
 * Class MaintenanceCompletedRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Manage\Maintenance
 */
class MaintenanceCompletedRepositoryEloquent extends BaseRepository implements MaintenanceCompletedRepository
{

    public function getIdMaintenanceCompleted($id)
    {
        $dados = $this->with(['provider'])
            ->orderBy('date', 'desc')
            ->findWhere([
                'maintenance_id' => $id
            ]);

        return $dados;
    }

    public function getMaintenanceCompleted($id)
    {
        $dados = $this->with(['provider'])->find($id);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MaintenanceCompleted::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MaintenanceCompletedValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
