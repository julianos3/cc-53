<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\CalledCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CalledCategoryPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class CalledCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CalledCategoryTransformer();
    }
}
