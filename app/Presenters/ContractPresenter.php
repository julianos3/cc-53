<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\ContractTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContractPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class ContractPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContractTransformer();
    }
}
