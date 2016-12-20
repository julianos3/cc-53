<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\MessageTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MessagePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class MessagePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MessageTransformer();
    }
}
