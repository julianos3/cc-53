<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\ReserveAreaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ReserveAreaPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class ReserveAreaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ReserveAreaTransformer();
    }
}
