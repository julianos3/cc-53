<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\CalledTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CalledPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class CalledPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CalledTransformer();
    }
}
