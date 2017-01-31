<?php

namespace CentralCondo\Repositories\Portal\Condominium\SecurityCam;

use CentralCondo\Entities\Portal\Condominium\SecurityCam\SecurityCam;
use CentralCondo\Validators\Portal\Condominium\SecurityCam\SecurityCamValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class SecurityCamRepositoryEloquent
 * @package namespace CentralCondo\Repositories;
 */
class SecurityCamRepositoryEloquent extends BaseRepository implements SecurityCamRepository, CacheableInterface
{
    use CacheableRepository;

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->findWhere(['condominium_id' => $condominiumId]);

        return $dados;
    }

    public function getId($id)
    {
        $dados = $this->findWhere(['id' => $id, 'condominium_id' => session()->get('condominium_id')]);

        return $dados[0];
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SecurityCam::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return SecurityCamValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
