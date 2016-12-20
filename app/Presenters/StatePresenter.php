<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\StateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class StatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StateTransformer();
    }
}
