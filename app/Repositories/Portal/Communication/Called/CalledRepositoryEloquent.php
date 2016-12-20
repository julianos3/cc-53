<?php

namespace CentralCondo\Repositories\Portal\Communication\Called;

use CentralCondo\Entities\Portal\Communication\Called\Called;
use CentralCondo\Validators\Portal\Communication\Called\CalledValidator;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CalledRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Called
 */
class CalledRepositoryEloquent extends BaseRepository implements CalledRepository
{

    public function getAllCondominium()
    {
        $userRoleCondominium = session()->get('user_role_condominium');
        $condominiumId = session()->get('condominium_id');
        $userCondominiumId = session()->get('user_condominium_id');

        if ($userRoleCondominium == 1 || $userRoleCondominium == 2 ||
            $userRoleCondominium == 3 || $userRoleCondominium == 7 ||
            $userRoleCondominium == 9
        ) {
            $dados = $this->orderBy('created_at', 'desc')
                ->with(['userCondominium', 'calledCategory', 'calledStatus'])
                ->findWhere(['condominium_id' => $condominiumId]);
        } else {
            $dados = $this->orderBy('created_at', 'desc')
                ->with(['userCondominium', 'calledCategory', 'calledStatus'])
                ->findWhere([
                    'condominium_id' => $condominiumId,
                    'user_condominium_id' => $userCondominiumId,
                    'visible' => 'y'
                ]);
        }

        return $dados;
    }

    public function getId($id)
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->with(['calledCategory', 'calledStatus', 'calledHistoric', 'userCondominium'])
            ->findWhere(['id' => $id, 'condominium_id' => $condominiumId]);

        return $dados[0];
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Called::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return CalledValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
