<?php

namespace CentralCondo\Repositories\Portal\Condominium\Block;

use CentralCondo\Entities\Portal\Condominium\Block\BlockNomemclature;
use CentralCondo\Validators\Portal\Condominium\Block\BlockNomemclatureValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class BlockNomemclatureRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Block
 */
class BlockNomemclatureRepositoryEloquent extends BaseRepository implements BlockNomemclatureRepository, CacheableInterface
{
    use CacheableRepository;

    public function getId($id)
    {
        $dados = $this->findWhere(['id' => $id, 'active' => 'y']);
        return $dados[0];
    }

    public function getAll()
    {
        $dados = $this->orderBy('name', 'asc')->findWhere(['active' => 'y']);
        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BlockNomemclature::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return BlockNomemclatureValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
