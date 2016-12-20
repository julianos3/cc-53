<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\MessageReplyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MessageReplyPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class MessageReplyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MessageReplyTransformer();
    }
}
