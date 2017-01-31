<?php

namespace CentralCondo\Repositories\Portal\Condominium\Group;

use CentralCondo\Entities\Portal\Condominium\Group\GroupCondominium;
use CentralCondo\Validators\Portal\Condominium\Group\GroupCondominiumValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class GroupCondominiumRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Group
 */
class GroupCondominiumRepositoryEloquent extends BaseRepository implements GroupCondominiumRepository, CacheableInterface
{
    use CacheableRepository;

    public function getGroup($id)
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->findWhere(['id' => $id, 'condominium_id' => $condominiumId]);

        return $dados[0];
    }

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('name', 'asc')->findWhere(['condominium_id' => $condominiumId]);

        return $dados;
    }

    public function getAllCondominiumUser()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this
            ->orderBy('name', 'asc')
            ->whereHas('userGroupCondominium', function ($q) {
                $q->where('user_condominium_id', '=', session()->get('user_condominium_id'));
            })->findWhere(['condominium_id' => $condominiumId]);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GroupCondominium::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return GroupCondominiumValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
