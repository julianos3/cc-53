<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\PortalCondominiumFinalityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PortalCondominiumFinalityPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class PortalCondominiumFinalityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PortalCondominiumFinalityTransformer();
    }
}
