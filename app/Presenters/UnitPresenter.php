<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UnitTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UnitPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UnitPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UnitTransformer();
    }
}
