<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UserCommunicationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserCommunicationPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UserCommunicationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserCommunicationTransformer();
    }
}
