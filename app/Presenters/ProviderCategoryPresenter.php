<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\ProviderCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProviderCategoryPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class ProviderCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProviderCategoryTransformer();
    }
}
