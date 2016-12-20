<?php

namespace CentralCondo\Repositories\Portal\Condominium\Provider;

use CentralCondo\Entities\Portal\Condominium\Provider\Provider;
use CentralCondo\Validators\Portal\Condominium\Provider\ProviderValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProviderRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Provider
 */
class ProviderRepositoryEloquent extends BaseRepository implements ProviderRepository
{

    public function getProvider($id)
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->findWhere(['id' => $id, 'condominium_id' => $condominiumId]);

        return $dados[0];
    }

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('name', 'asc')
            ->with(['providerCategory'])
            ->findWhere(['condominium_id' => $condominiumId]);

        return $dados;
    }

    public function getAllCondominiumActive()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('name', 'asc')
            ->with(['providerCategory'])
            ->findWhere(['condominium_id' => $condominiumId, 'active' => 'y']);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Provider::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return ProviderValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
