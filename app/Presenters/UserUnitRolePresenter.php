<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UserUnitRoleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserUnitRolePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UserUnitRolePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserUnitRoleTransformer();
    }
}
