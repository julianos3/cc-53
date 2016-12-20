<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UserGroupCondominiumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserGroupCondominiumPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UserGroupCondominiumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserGroupCondominiumTransformer();
    }
}
