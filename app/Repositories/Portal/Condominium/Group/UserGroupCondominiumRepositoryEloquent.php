<?php

namespace CentralCondo\Repositories\Portal\Condominium\Group;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Group\UserGroupCondominiumRepository;
use CentralCondo\Entities\Portal\Condominium\Group\UserGroupCondominium;
use CentralCondo\Validators\Portal\Condominium\Group\UserGroupCondominiumValidator;

/**
 * Class UserGroupCondominiumRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Group
 */
class UserGroupCondominiumRepositoryEloquent extends BaseRepository implements UserGroupCondominiumRepository
{

    /**
     * @param $groupId
     * @return mixed
     */
    public function getAllGroupCondominium($groupId)
    {
        $dados = $this->with('userCondominium')->findWhere(['group_id' => $groupId]);

        return $dados;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserGroupCondominium::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserGroupCondominiumValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
