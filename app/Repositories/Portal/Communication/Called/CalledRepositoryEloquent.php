<?php

namespace CentralCondo\Repositories\Portal\Communication\Called;

use CentralCondo\Entities\Portal\Communication\Called\Called;
use CentralCondo\Validators\Portal\Communication\Called\CalledValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class CalledRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Communication\Called
 */
class CalledRepositoryEloquent extends BaseRepository implements CalledRepository, CacheableInterface
{
    use CacheableRepository;

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $userCondominiumId = session()->get('user_condominium_id');

        if ($this->checkAdmin()) {
            $dados = $this->orderBy('created_at', 'desc')
                ->with(['userCondominium', 'calledCategory', 'calledStatus'])
                ->findWhere(['condominium_id' => $condominiumId]);
        } else {
            $dados = $this->orderBy('created_at', 'desc')->with(['userCondominium', 'calledCategory', 'calledStatus'])
                ->scopeQuery(function($query) use ($condominiumId, $userCondominiumId){
                return $query->where('user_condominium_id', $userCondominiumId)
                    ->orWhere('visible', 'y');
            })->findWhere(['condominium_id' => $condominiumId]);
        }

        return $dados;
    }

    public function checkAdmin()
    {
        $userRoleCondominium = session()->get('user_role_condominium');
        if ($userRoleCondominium == 1 || $userRoleCondominium == 2 ||
            $userRoleCondominium == 3 || $userRoleCondominium == 7 ||
            $userRoleCondominium == 9
        ) {
            return true;
        }

        return false;
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
