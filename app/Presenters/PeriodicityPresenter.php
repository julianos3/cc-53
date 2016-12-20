<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\PeriodicityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PeriodicityPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class PeriodicityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PeriodicityTransformer();
    }
}
