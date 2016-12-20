<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UserCondominiumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserCondominiumPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UserCondominiumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserCondominiumTransformer();
    }
}
