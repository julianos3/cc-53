<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\CalledHistoricTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CalledHistoricPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class CalledHistoricPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CalledHistoricTransformer();
    }
}
