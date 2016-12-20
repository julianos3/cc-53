<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\CalledStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CalledStatusPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class CalledStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CalledStatusTransformer();
    }
}
