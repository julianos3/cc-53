<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UnitTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UnitTypePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UnitTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UnitTypeTransformer();
    }
}
