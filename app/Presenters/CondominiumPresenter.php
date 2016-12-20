<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\CondominiumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CondominiumPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class CondominiumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CondominiumTransformer();
    }
}
