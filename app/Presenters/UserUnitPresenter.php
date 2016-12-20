<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\UserUnitTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserUnitPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class UserUnitPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserUnitTransformer();
    }
}
