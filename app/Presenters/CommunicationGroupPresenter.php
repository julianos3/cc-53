<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\CommunicationGroupTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CommunicationGroupPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class CommunicationGroupPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CommunicationGroupTransformer();
    }
}
