<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\ProviderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProviderPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class ProviderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProviderTransformer();
    }
}
