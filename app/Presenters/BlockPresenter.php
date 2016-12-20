<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\BlockTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BlockPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class BlockPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlockTransformer();
    }
}
