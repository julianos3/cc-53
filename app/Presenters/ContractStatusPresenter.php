<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\ContractStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContractStatusPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class ContractStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContractStatusTransformer();
    }
}
