<?php

namespace CentralCondo\Presenters;

use CentralCondo\Transformers\MaintenanceCompletedTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MaintenanceCompletedPresenter
 *
 * @package namespace CentralCondo\Presenters;
 */
class MaintenanceCompletedPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MaintenanceCompletedTransformer();
    }
}
