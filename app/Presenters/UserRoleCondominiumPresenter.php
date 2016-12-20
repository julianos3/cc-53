<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UserRoleCondominiumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserRoleCondominiumPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UserRoleCondominiumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserRoleCondominiumTransformer();
    }
}
