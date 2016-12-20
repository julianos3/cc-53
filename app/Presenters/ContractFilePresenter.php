<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\ContractFileTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContractFilePresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class ContractFilePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContractFileTransformer();
    }
}
