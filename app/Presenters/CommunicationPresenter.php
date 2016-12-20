<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\CommunicationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CommunicationPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class CommunicationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CommunicationTransformer();
    }
}
