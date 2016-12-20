<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UserRoleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserRolePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UserRolePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserRoleTransformer();
    }
}
