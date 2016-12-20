<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\FinalityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FinalityPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class FinalityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FinalityTransformer();
    }
}
