<?php

namespace CentralCondo\Repositories\Portal\Condominium\Condominium;

use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CentralCondo\Repositories\Portal\Condominium\Condominium\UserCondominiumRepository;
use CentralCondo\Entities\Portal\Condominium\Condominium\UserCondominium;
use CentralCondo\Validators\Portal\Condominium\Condominium\UserCondominiumValidator;

/**
 * Class UserCondominiumRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Condominium
 */
class UserCondominiumRepositoryEloquent extends BaseRepository implements UserCondominiumRepository
{

    public function getUserAdm()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->scopeQuery(function($query) use ($condominiumId){
            return $query->where('condominium_id', $condominiumId)
                ->where('user_role_condominium_id', 1)
                ->orWhere('user_role_condominium_id', 2)
                ->orWhere('user_role_condominium_id', 3)
                ->orWhere('user_role_condominium_id', 7)
                ->orWhere('user_role_condominium_id', 9);
        })->all();

        if($dados->toArray()){
            return $dados;
        }

        return false;
    }

    public function checkAdm($userRoleCondominium)
    {
        if(isset($userRoleCondominium)){
            if($userRoleCondominium == 1 || $userRoleCondominium == 2 || $userRoleCondominium == 3
                || $userRoleCondominium == 7 || $userRoleCondominium == 9){
                return true;
            }
        }

        return false;
    }

    public function getUserCondominiums()
    {
        $dados = $this->with(['user', 'condominium'])
            ->findWhere([
                'user_id' => Auth::user()->id
            ]);

        return $dados;
    }

    public function getCount()
    {
        $dados = $this->with(['user', 'condominium'])
            ->findWhere([
                'user_id' => Auth::user()->id
            ]);

        return $dados->count();
    }

    public function getUserCondominium()
    {
        $dados = $this->findWhere([
            'user_id' => Auth::user()->id,
            'condominium_id' => session()->get('condominium_id')
        ]);
        return $dados[0];
    }

    public function getUserCondominiumId($id)
    {
        $dados = $this->with(['user', 'userUnit', 'userRoleCondominium'])->findWhere([
            'id' => $id,
            'condominium_id' => session()->get('condominium_id')
        ]);
        return $dados[0];

    }

    public function getUserCondominiumIdUser($id)
    {
        $dados = $this->with(['user', 'userUnit', 'userRoleCondominium'])->findWhere([
            'user_id' => $id,
            'condominium_id' => session()->get('condominium_id')
        ]);
        //dd($id);
        return $dados[0];

    }

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->with(['user', 'userUnit', 'userRoleCondominium'])->findWhere(['condominium_id' => $condominiumId]);

        return $dados;
    }

    public function getAllCondominiumActive()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->with('user')->findWhere(['condominium_id' => $condominiumId, 'active' => 'y']);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserCondominium::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserCondominiumValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}