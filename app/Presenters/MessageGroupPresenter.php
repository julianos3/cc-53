<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\MessageGroupTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MessageGroupPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class MessageGroupPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MessageGroupTransformer();
    }
}
