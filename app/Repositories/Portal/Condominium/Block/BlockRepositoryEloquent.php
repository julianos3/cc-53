<?php

namespace CentralCondo\Repositories\Portal\Condominium\Block;

use CentralCondo\Entities\Portal\Condominium\Block\Block;
use CentralCondo\Validators\Portal\Condominium\Block\BlockValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BlockRepositoryEloquent
 * @package CentralCondo\Repositories\Portal\Condominium\Block
 */
class BlockRepositoryEloquent extends BaseRepository implements BlockRepository
{

    public function getBlock($id)
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->findWhere(['id' => $id, 'condominium_id' => $condominiumId]);

        return $dados[0];
    }

    public function deleteAllCondominium()
    {
        $block = $this->getAllCondominium();
        if ($block) {
            foreach ($block as $row) {
                $this->delete($row->id);
            }
        }

        return true;
    }

    public function getAllCondominium()
    {
        $condominiumId = session()->get('condominium_id');
        $dados = $this->orderBy('name', 'asc')->findWhere(['condominium_id' => $condominiumId]);

        return $dados;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Block::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return BlockValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
