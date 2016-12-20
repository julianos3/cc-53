<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\BlockNomemclatureTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlockNomemclaturePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class BlockNomemclaturePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlockNomemclatureTransformer();
    }
}
