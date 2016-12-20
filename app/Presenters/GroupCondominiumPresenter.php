<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\GroupCondominiumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GroupCondominiumPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class GroupCondominiumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GroupCondominiumTransformer();
    }
}
